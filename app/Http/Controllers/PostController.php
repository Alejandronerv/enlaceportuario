<?php

namespace App\Http\Controllers;
use App\Services\ApiService;
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
        return view('apitest', compact('posts'));
    }
}
