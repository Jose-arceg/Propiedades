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
        $user = User::findOrFail(Auth()->id());
        $code = $user->code;
        $token = $user->token;
        if (!empty($_GET['code'])) {
            $code = $_GET['code'];
            $user = User::findOrFail(Auth()->id());
            $user->code = $code;
            $user->save();
            return redirect('/home');
        }
        if (!$code) {
            return redirect(sprintf(
                'https://auth.mercadolibre.cl/authorization?response_type=code&client_id=%s&redirect_uri=%s',
                env('ML_CLIENT_ID'),
                env('ML_REDIRECT_URI')
            ));
        }

        if ($token === null) {
            $this->token($user);
        }
        return view('home');
    }

    public function token($user)
    {
        $code = $user->code;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.mercadolibre.com/oauth/token', [

            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ],
            'json' => [
                'grant_type' => 'authorization_code',
                'client_id' => env('ML_CLIENT_ID'),
                'client_secret' => env('ML_CLIENT_SECRET'),
                'code' => $code,
                'redirect_uri' => env('ML_REDIRECT_URI'),
            ],
        ]);
        $data = json_decode($response->getBody()->getContents());
        $user->token = $data->access_token;
        $user->rtoken = $data->refresh_token;
        $user->save();
        return redirect()->back();
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
