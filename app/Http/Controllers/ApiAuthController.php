<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    public function apiAuth()
    {
        $client = new Client();
        $api_host = env('API_HOST');


        $response = $client->post($api_host.'/auth', [
            'form_params' => [
                'username' => env('API_USERNAME'),
                'password' => env('API_PASSWORD')
            ]
        ]);

        // Manejar la respuesta
        if ($response->getStatusCode() === 200) {
            // Handle successful authentication
            $body = $response->getBody();
            $data = json_decode($body, true);
            return response()->json($data);
        } else {
            // Handle authentication error
            return response()->json(['error' => 'Authentication failed'], $response->getStatusCode());
        }
       
    }
}
