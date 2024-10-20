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
}
