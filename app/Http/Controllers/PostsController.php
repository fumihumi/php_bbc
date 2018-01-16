<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use View;

class PostsController extends Controller
{
    public function index()
    {
        // postsテーブルの全データを取得
        $posts = Post::all();
        // 結果をビューに送る
        return View('bbc.index')->with('posts', $posts);
    }

    public function show($id){
        $post = Post::find($id);
        return view('bbc.single')->with('post',$post);
    }
}
