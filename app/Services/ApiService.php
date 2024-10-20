<?php

// app/Services/ApiService.php
namespace App\Services;
use Illuminate\Support\Facades\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class ApiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            // 'base_uri' => 'http://201.218.201.18:5000',
            'base_uri' => 'http://127.0.0.1:5000',
        ]);
    }

    public function getPosts()
    {
        try {
            $response = $this->client->request('GET', '/');
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            // Handle the exception or log the error
            return ['error' => 'Request failed'];
        }
    }

    // public function getToken()
    // {
    //     // URL del endpoint de autenticación en FastAPI
    //     $url = 'http://127.0.0.1:5000/auth'; 
    
    //     // Los datos que necesitas enviar para autenticar (usuario y contraseña)
    //     $credentials = [
    //         'username' => 'user',
    //         'password' => 'passw',
    //     ];
    
    //     // Enviar la solicitud POST al endpoint de FastAPI
    //     $response = Http::post($url, $credentials);
    
    //     // Verificar si la respuesta es exitosa (código 200)
    //     if ($response->successful()) {
    //         // Obtener el token desde la respuesta
    //         $token = $response->json()['access_token'];
    
    //         // Puedes guardar el token o utilizarlo inmediatamente
    //         return $token;
    //     } else {
    //         // Manejo de errores si la solicitud falla
    //         return response()->json(['error' => 'Autenticación fallida'], 401);
    //     }
    // }

    public function getToken($username, $password)
    {
        try {
            $response = $this->client->request('POST', '/auth', [
                'multipart' => [
                    'username' => 'user',
                    'password' => 'passw',
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            return $data['access_token'] ?? null;
        } catch (RequestException $e) {
            return null;
        }
    }


}
