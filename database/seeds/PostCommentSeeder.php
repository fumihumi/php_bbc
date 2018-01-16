<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Comment;
use App\Post;
use Faker\Factory as Faker;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // postsテーブルを一旦削除 truncateはIDもリセットされる
        Post::truncate();
        Category::truncate();
        Comment::truncate();

        // Fakerを使う ダミーデータを作成してくれる
        $faker = Faker::create('ja_JP');

        $content = 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。';

        $commentdammy = 'コメントダミーです。ダミーコメントだよ。';

        // insert レコードを10個挿入
        for( $i = 1 ; $i <= 10 ; $i++) {
            $post = new Post;
            $post->title = "$i 番目の投稿";
            $post->content = $content;
            $post->cat_id = 1;
            $post->comment_count = 0;
            $post->save();

            // 乱数の範囲を指定し、3~15の間で乱数を生成
            $maxComments = mt_rand(3, 15);
            for ($j=0; $j <= $maxComments; $j++) {
                $comment = new Comment;
                $comment->commenter = '名無しさん';
                $comment->comment = $commentdammy;

                // モデル(Post.php)のCommentsメソッドを読み込み、post_idにデータを保存する
                $post->comments()->save($comment);
                // カラム値の増加
                $post->increment('comment_count');
            }
        }

        // カテゴリーを追加する
        $cat1 = new Category;
        $cat1->name = "電化製品";
        $cat1->save();

        $cat2 = new Category;
        $cat2->name = "食品";
        $cat2->save();
    }
}