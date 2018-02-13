@extends('layouts.app')
@section('content')

    <div class="col-xs-8 col-xs-offset-2">

        <h1>投稿ページ</h1>

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

        {!! Form::open(['route' => 'bbc.store'], array('class' => 'form')) !!}

        <div class="form-group">
            <label for="msg" class="">message</label>
            <div class="">
                {!! Form::text('msg', null, array('class' => '')) !!}
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">投稿する</button>
            <a class="btn btn-default" href="#" onClick="history.back(); return false;">戻る</a>
        </div>

        {!! Form::close() !!}

    </div>

@endsection