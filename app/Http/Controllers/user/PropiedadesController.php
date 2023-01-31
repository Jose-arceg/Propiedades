<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropiedadRequest;
use App\Models\Propiedad;
use App\Models\Region;
use Illuminate\Http\Request;

class PropiedadesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function mispropiedades()
    {
        $propiedades = Propiedad::where('user_id', auth()->id())->get();
        return view('user.mispropiedades')->with('propiedades', $propiedades);
    }

    public function crearpropiedades()
    {
        $region = Region::select('code', 'name')->get();
        return view('user.crearpropiedades')->with('region', $region);
    }

    public function insertarpropiedades(StorePropiedadRequest $request)
    {
        Propiedad::create($request->validated());
        return redirect('mispropiedades')->withSuccessp('Propiedad agregada con exito');
    }

    public function deshabilitar($id)
    {
        $propiedad = Propiedad::where('id', $id)->first();
        $propiedad->delete();
        return redirect('mispropiedades')->withDeleted("Propiedad Deshabilitado con exito");
    }
    //TODO: categorias fotos

    /*$sources = $request->file('source');
    if ($request->hasFile('source')) {
    foreach ($sources as $source) {
    $destination_path = '/public/images';
    $imagen = [];
    $imagen_name = $source->getClientOriginalName();
    $path = $source->storeAs($destination_path, $imagen_name);
    $imagen['image'] = $imagen_name;
    imagenes::Create($imagen);
    }
    }*/
    public function publicar(Request $request)
    {

        $imagenes = [];
        $source = $request->input('source');
        foreach ($source as $s) {
            $imagenes[] = [
                "source" => $s,
            ];
        }
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.mercadolibre.com/items', [

            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
                'Authorization' => 'Bearer APP_USR-2635352016401575-013115-22bdcde9cee3c30645f87e2be9564efe-1296628171',
            ],
            'json' => [
                "title" => $request->nombre,
                "category_id" => "MLC157520",
                "price" => $request->venta,
                "currency_id" => "CLP",
                "available_quantity" => 1,
                "buying_mode" => "classified",
                "listing_type_id" => "silver",
                "condition" => $request->condicion,
                "channels" =>
                [
                    "marketplace",
                ],
                "pictures" => $imagenes,
                "seller_contact" => [
                    "contact" => $request->vendedor,
                    "other_info" => $request->info,
                    "area_code" => "56",
                    "phone" => $request->telefono,
                    "email" => $request->email,
                ],
                "location" => [
                    "address_line" => $request->direccion,
                    "zip_code" => "2910000",
                    "neighborhood" => [
                        "id" => $request->Barrio,
                    ],
                    "latitude" => $request->latitude,
                    "longitude" => $request->lonngitude,
                ],
                "attributes" => [
                    [
                        "id" => "ROOMS",
                        "value_name" => $request->piezas,
                    ],
                    [
                        "id" => "FULL_BATHROOMS",
                        "value_name" => $request->baños,
                    ],
                    [
                        "id" => "PARKING_LOTS",
                        "value_name" => $request->estacionamiento,
                    ],
                    [
                        "id" => "BEDROOMS",
                        "value_name" => $request->dormitorios,
                    ],
                    [
                        "id" => "COVERED_AREA",
                        "value_name" => $request->construido . " m2",
                    ],
                    [
                        "id" => "TOTAL_AREA",
                        "value_name" => $request->terreno . " m2",
                    ],
                ],

            ],
        ]);
        return redirect('user.crearpropiedades');
    }

    public function comunas(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.mercadolibre.com/classified_locations/states/' . $request->region . '', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ],
        ]);
        $data = json_decode($response->getBody()->getContents());
        return response()->json(
            [
                'lista' => $data->cities,
                'success' => true,
            ]
        );
    }
    public function barrios(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.mercadolibre.com/classified_locations/cities/' . $request->comuna . '', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ],
        ]);
        $data = json_decode($response->getBody()->getContents());
        return response()->json(
            [
                'lista' => $data->neighborhoods,
                'success' => true,
            ]
        );
    }

    public function location(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.mercadolibre.com/classified_locations/neighborhoods/' . $request->barrio . '', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ],
        ]);
        $data = json_decode($response->getBody()->getContents());
        return response()->json(
            [
                'lista' => $data->geo_information->location,
                'success' => true,
            ]
        );
    }

}
