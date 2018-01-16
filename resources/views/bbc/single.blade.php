@extends('layouts.default')
@section('content')

    <script type="text/javascript">
        $(document).on('click','#delet-button', function() {
            // 確認ダイアログ
            if(confirm("削除しますか？") === false) {
                return false;
            }
        });
    </script>

    <div class="col-xs-8 col-xs-offset-2">

        <h2>タイトル：{{ $post->title }}
            <small>s：{{ date("Y年 m月 d日", strtotime($post->created_at)) }}</small>
        </h2>
        <p>カテゴリー：{{ $post->category->name }}</p>
        <p>{{ $post->content }}</p>

        <hr />

        <h3>コメント一覧</h3>
        @foreach($post->comments as $single_comment)
            <h4>{{ $single_comment->commenter }}</h4>
            <p>{{ $single_comment->comment }}</p>
            {!! Form::open(['route' => 'comment.deletButton'], array('class' => 'form')) !!}
                <div class="form-group">
                <button id="delet-button" name="id" value="{{ $single_comment->id }},{{ $single_comment->post_id }}" class="btn btn-defalt">削除</button><br />
                </div>
            {!! Form::close() !!}



        @endforeach
        <h3>コメントを投稿する</h3>
        {{-- 投稿完了時にフラッシュメッセージを表示 --}}
        @if(Session::has('message'))
            <div class="bg-info">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif

        {{-- エラーメッセージの表示 --}}
        @foreach($errors->all() as $message)
            <p class="bg-danger">{{ $message }}</p>
        @endforeach

        {!! Form::open(['route' => 'comment.store'], array('class' => 'form')) !!}

        <div class="form-group">
            <label for="commenter" class="">名前</label>
            <div class="">
                {!! Form::text('commenter', null, array('class' => '')) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="comment" class="">コメント</label>
            <div class="">
                {!! Form::textarea('comment', null, array('class' => '')) !!}
            </div>
        </div>

        {!! Form::hidden('post_id', $post->id) !!}

        <div class="form-group">
            <button type="submit" class="btn btn-primary">投稿する</button>
            <a class="btn btn-default" href="#" onClick="history.back(); return false;">戻る</a>
        </div>


        {!! Form::close() !!}
    </div>

@stop