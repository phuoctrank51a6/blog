<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        return view('backend.search');
    }
    public function autocomplete(Request $request)
    {

        $data = Post::select("title as name")->where("title", "LIKE", "%{$request->input('query')}%")->get();
        return response()->json($data);
    }
    public function detailPost(Request $request)
    {
        $post = Post::select("*")->where("title", "LIKE", "%{$request->keywords}%")->first();
        return view('backend.post.detail', ['post' => $post]);
    }
}
