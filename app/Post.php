<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'cat_id'];
    //
    /**
     * ブログポストのコメントを取得
     */
    public function Comments(){
        // 投稿はたくさんのコメントを持つ(hasManyの第2引数が、post_idで、第3引数が、idの場合は省略することができます。)
        return $this->hasMany('App\Comment', 'post_id');
    }
    /**
     * ブログポストのカテゴリーを取得
     */
    public function Category(){
        // 投稿は1つのカテゴリーに属する(belongsToの第2引数が、cat_idで、第3引数がidの場合は省略することができます)
        return $this->belongsTo('App\Category', 'cat_id');
    }
}
