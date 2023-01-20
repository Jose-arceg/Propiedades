<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Propiedad;
use App\Http\Requests\StorePropiedadRequest;

class PropiedadesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function mispropiedades()

        {
            $propiedades = Propiedad::where('user_id' , auth()->id())->get();
            return view('user.mispropiedades')->with('propiedades', $propiedades);
        }
    
        public function crearpropiedades()
    {
        return view('user.crearpropiedades') ;
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

}
