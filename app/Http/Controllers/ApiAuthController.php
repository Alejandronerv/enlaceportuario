<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

// use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    public function apiAuth()
    {
        $client = new Client();
        $api_host = env('API_HOST');


        $response = $client->post($api_host . '/auth', [
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
            // return response()->json($data);
            $accessToken = $data['access_token'] ?? null;
            $tokenType = $data['token_type'] ?? null;
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

        $currentDate = Carbon::now();
        $futureDate = $currentDate->addDays(7);
        $formattedCurrentDate = $currentDate->format('Ymd');
        $formattedFutureDate = $futureDate->format('Ymd');

        $response = $client->request('GET', $api_host . '/api/ver1/OperationBerth/'.$formattedCurrentDate.'/'.$formattedFutureDate, [
            'headers' => [
                'accept' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken,
            ],
        ]);

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents());
            $berthFields = $data; // Assuming $data contains the fields needed for the view
            return view('berth.table', compact('berthFields'));
        } else {
            // Handle authentication error
            return response()->json(['error' => 'No Data Found'], $response->getStatusCode());
        }
    }

    public function containerOperationInformation(Request $request)
    {
        $client = new Client();
        $api_host = env('API_HOST');
        $containerNumber = $request->input('inputContainerNumber');
        // Retrieve tokens from session
        $accessToken = Session::get('accessToken');

        $response = $client->request('GET', $api_host . '/api/ver1/CntrOperationInformation/' . $containerNumber, [
            'headers' => [
                'accept' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken,
            ],
        ]);
        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents());
            $containerFields = $data; // Assuming $data contains the fields needed for the view
            return view('container-info.table', compact('containerFields'));
        } else {
            // Handle authentication error
            return response()->json(['error' => 'No Data Found'], $response->getStatusCode());
        }
    }

    public function vesselOperationSummary()
    {
        $client = new Client();
        $api_host = env('API_HOST');
        // Retrieve tokens from session
        $accessToken = Session::get('accessToken');

        $response = $client->request('GET', $api_host . '/api/ver1/VesselOperationSummary/EMC/201406', [
            'headers' => [
                'accept' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken,
            ],
        ]);

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents());
            $veselFields = $data; // Assuming $data contains the fields needed for the view
            return view('vessel-operation-summary.table', compact('veselFields'));
        } else {
            // Handle authentication error
            return response()->json(['error' => 'No Data Found'], $response->getStatusCode());
        }
    }
}
