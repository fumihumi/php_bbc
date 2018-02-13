@extends('layouts.app')
@section('content')

    <div class="col-xs-8 col-xs-offset-2">
        <br/>
        <h3>
            <p>投稿ページ：{{ link_to("/bbc/create/", '投稿する', array('class' => '')) }}</p>
        </h3>

        @foreach($posts as $post)
            <ul>
                <ol>
                    <h2>message：{{ $post->msg }}
                        <small>投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</small>
                    </h2>

                    {!! Form::open(['route' => 'post.deletButton'], array('class' => 'form')) !!}
                    <div class="form-group">
                        <button id="delet-button" name="id" value="{{ $post->id }}" class="btn btn-defalt">削除</button><br />
                    </div>
                    {!! Form::close() !!}
                </ol>
            </ul>

            <hr />


        @endforeach
        {{ $posts->links() }}
    </div>
@endsection