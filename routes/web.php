<?php

/* デフォルト */
//Route::get('/', function () {
//    return view('PostsController@index');
//});

Route::get('/', 'PostsController@index');


/* 掲示板一覧 */
//Route::get('bbc','PostsController@index')->name('bbc.index');
/* コメント一覧 */
//Route::get('bbc/{id}', 'PostsController@show')->name('bbc.show');
/* 投稿ページ */
//Route::get('bbc/create','PostsController@create')->name('bbc.create');

/* リソースに対する様々なアクションを処理する、複数のルートがこの１定義により生成されます */
Route::resource('bbc', 'PostsController');

Route::resource('comment', 'CommentsController');

Route::post('post/delet', 'PostsController@deletButton')->name('post.deletButton');
Auth::routes();
