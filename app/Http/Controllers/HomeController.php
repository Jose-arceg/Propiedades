<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!empty($_GET['code'])) {
            $code = $_GET['code'];
            $user = User::findOrFail(Auth()->id());
            $user->code = $code;
            $user->save();
        }
        return view('home');
    }

    public function token()
    {
        $user = User::findOrFail(Auth()->id());
        $code = $user->code;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.mercadolibre.com/oauth/token', [

            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ],
            'json' => [
                'grant_type' => 'authorization_code',
                'client_id' => '2635352016401575',
                'client_secret' => 'N0HKlWdefzsVqdqfFjARP6Xx8Nae78a2',
                'code' => $code,
                'redirect_uri' => 'http://localhost:8000/home'
            ],
        ]);
        $data = json_decode($response->getBody()->getContents());
        $user->token = $data->access_token;
        $user->rtoken = $data->refresh_token;
        $user->save();
        return redirect()->back();
    }

}
