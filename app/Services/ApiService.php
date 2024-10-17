<?php

// app/Services/ApiService.php
namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ApiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://201.218.201.18:5000',
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

    public function getToken()
    {
        try {
            $response = $this->client->request('POST', '/auth', [
                'form_params' => [
                    'username' => 'CLUSRADM',
                    'password' => 'kL9!FG78Bd1',
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            return $data['token'] ?? null; 
        } catch (RequestException $e) {
            return null;
        }
    }
}