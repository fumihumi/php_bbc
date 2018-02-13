<?php

/* デフォルト */
Route::get('/', function () {
    return view('PostsController@index');
});

/* 掲示板一覧 */
//Route::get('bbc','PostsController@index')->name('bbc.index');
/* コメント一覧 */
//Route::get('bbc/{id}', 'PostsController@show')->name('bbc.show');
/* 投稿ページ */
//Route::get('bbc/create','PostsController@create')->name('bbc.create');

/* リソースに対する様々なアクションを処理する、複数のルートがこの１定義により生成されます */
Route::resource('bbc', 'PostsController');

Route::resource('comment', 'CommentsController');

/* カテゴリー */
Route::get('bbc/category/{id}', 'PostsController@showCategory')->name('bbc.showCategory');
Route::post('comment/delet', 'CommentsController@deletButton')->name('comment.deletButton');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
