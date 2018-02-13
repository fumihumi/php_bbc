<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['msg'];

    //
    /**
     * ブログポストのコメントを取得
     */
    public function Comments(){
        // 投稿はたくさんのコメントを持つ(hasManyの第2引数が、post_idで、第3引数が、idの場合は省略することができます。)
        return $this->hasMany('App\Comment', 'post_id');
    }
}
