<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use phpDocumentor\Reflection\Types\Null_;
use DB;

class CommentsController extends Controller
{
    //
    public function store(CommentStoreRequest $request)
    {
        if ($request != NULL or $request != "") {
            $posts = DB::table('posts')->where('id', $request->get('post_id'))->first();
            if ($posts != NULL or $posts != "") {
                $comment_count = $posts->comment_count + 1;
                DB::table('posts')->where('id', $request->get('post_id'))->update(['comment_count' => $comment_count]);
            }

            $comment = new Comment;
            $comment->post_id = $request->get('post_id');
            $comment->commenter = $request->get('commenter');
            $comment->comment = $request->get('comment');
            $comment->save();

            return redirect()->back()->with('message', 'コメントを投稿しました。');
        }
    }

    public function deletButton(Request $request)
    {
        if($request != NULL or $request != "") {
            $array = explode(',', $request->input('id'));
            $id = $array[0];
            $post_id = $array[1];

            $posts = DB::table('posts')->where('id', $post_id)->first();
            if($posts != NULL or $posts != "") {
                $comment_count = $posts->comment_count - 1;
                DB::table('posts')->where('id', $post_id)->update(['comment_count' => $comment_count]);
            }

            Comment::where('id', (int)$id)->delete();
            return redirect()->back()->with('message', 'コメントを削除しました。');
        }
    }
}
