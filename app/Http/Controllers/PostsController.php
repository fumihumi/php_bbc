<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use Illuminate\Http\Request;
use App\Post;
use View;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // postsテーブルの全データを取得
        $posts = Post::paginate(30);
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

        $username = \Auth::user()->name;
        $userid = \Auth::user()->id;
        $post = new Post;
        $post->msg = $request->get('msg');
        $post->user_name =  $username;
        $post->user_id = $userid;
        $post->save();
        $posts = Post::paginate(30);
        $message =  '投稿が完了しました。';
        return View('bbc.index',compact('posts', 'message'));

    }

    public function deletbutton(Request $request)
    {
        if($request != NULL or $request != "") {
//            $id = explode(',', $request->input('id'));
            $id = $request['id'];
            Post::where('id', (int)$id)->delete();
            return redirect()->back()->with('message', '投稿を削除しました。');
        }

    }
}
