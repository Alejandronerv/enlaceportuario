<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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

    public function operationBerth()
    {
        $client = new Client();
        $api_host = env('API_HOST');

        // Retrieve tokens from session
        $accessToken = Session::get('accessToken');
        $tokenType = Session::get('tokenType');

        $response = $client->get($api_host.'/api/v1/OperationBerth', [
            'headers' => [
                'Authorization' => $tokenType . ' ' . $accessToken,
            ],
            'form_params' => [
                'PI_DATE_FROM_ETB' => env('19000101'),
                'PI_DATE_TO_ETB' => env('20240101')
            ]
        ]);

        // Handle the response
        if ($response->getStatusCode() === 200) {
            // Successful request
            $body = $response->getBody();
            $data = json_decode($body, true);
            return response()->json($data);
        } else {
            // Handle error
            return response()->json(['error' => 'Request failed'], $response->getStatusCode());
        }
    }

}
