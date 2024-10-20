<?php
namespace App\Http\Controllers;
use App\Services\ApiService;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;


class PostController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function apiTest()
    {
        $posts = $this->apiService->getPosts();
        return response()->json($posts);
    }
<<<<<<< HEAD

    // AUTH ENDPOINT
    public function getAuthToken(Request $request)
    {
        // Validar los datos
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Lógica de autenticación (ejemplo con Laravel Passport)
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $token = auth()->user()->createToken('authToken')->accessToken;
            return response()->json(['token'   
 => $token], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
=======
>>>>>>> feature/berth-report
}
