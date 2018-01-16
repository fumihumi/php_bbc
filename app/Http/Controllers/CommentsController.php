<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;

class CommentsController extends Controller
{
    //
    public function store(CommentStoreRequest $request)
    {
        $comment = new Comment;
        $comment->post_id = $request->get('post_id');
        $comment->commenter = $request->get('commenter');
        $comment->comment = $request->get('comment');
        $comment->save();

        return redirect()->back()->with('message', 'コメントを投稿しました。');
    }
}
