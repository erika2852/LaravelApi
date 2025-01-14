<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // 모든 posts를 가져와서 반환
        $posts = Post::all();

        // JSON 형식으로 응답
        return response()->json($posts);
    }
}
