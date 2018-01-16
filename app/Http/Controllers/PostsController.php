<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
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

    public function create(){
        return view('bbc.create');
    }

    public function store(PostStoreRequest $request)
    {
        /**
         * 投稿した内容を登録
         */
        $post = new Post;
        $post->title   = $request->get('title');
        $post->content = $request->get('content');
        $post->cat_id  = $request->get('cat_id');
        $post->comment_count = 0;
        $post->save();

        return redirect()->back()->with('message', '投稿が完了しました。');
    }
}
