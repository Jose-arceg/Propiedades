<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $client;
    public function __construct()
    {
        $this->middleware('auth');
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::findOrFail(Auth()->id());
        if (isset($_GET['code'])) {
            $user->code = $_GET['code'];
            $user->save();
            return redirect('/home');
        }
        if (!$user->code) {
            return redirect(sprintf(
                'https://auth.mercadolibre.cl/authorization?response_type=code&client_id=%s&redirect_uri=%s',
                env('ML_CLIENT_ID'),
                env('ML_REDIRECT_URI')
            ));
        }
        if (!$user->token) {
            $this->token($user);
        }
        return view('home');
    }

    public function token($user)
    {

        $response = $this->client->request('POST', 'https://api.mercadolibre.com/oauth/token', [

            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ],
            'json' => [
                'grant_type' => 'authorization_code',
                'client_id' => env('ML_CLIENT_ID'),
                'client_secret' => env('ML_CLIENT_SECRET'),
                'code' => $user->code,
                'redirect_uri' => env('ML_REDIRECT_URI'),
            ],
        ]);
        $data = json_decode($response->getBody()->getContents());
        $user->token = $data->access_token;
        $user->rtoken = $data->refresh_token;
        $user->save();
    }

    public function code()
    {
        return redirect(sprintf(
            'https://auth.mercadolibre.cl/authorization?response_type=code&client_id=%s&redirect_uri=%s',
            env('ML_CLIENT_ID'),
            env('ML_REDIRECT_URI')
        ));
    }
}
