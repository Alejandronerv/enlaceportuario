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

        $response = $client->request('GET', 'http://201.218.201.18:5000/api/ver1/OperationBerth/20140101/20141231', [
            'headers' => [
                'accept' => 'application/json',
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX25hbWUiOiJDTFVTUkFETSIsImV4cCI6MTczMDA2NjQzOH0.ABimUL9Dr4y6ZzRpeFpeEdHosFHZhVHw28kfqr2o0e0',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents());

        return $data;
    }

}
