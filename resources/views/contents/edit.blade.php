{{-- 下記を追記する --}}
@extends('layouts.app')

@section('content')
{{-- 上記までを追記する --}}

<h1>edit</h1>

<p>投稿ID: {{$item['id']}}</p>
<form action="{{route('update')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$item['id']}}">
    <textarea name="content" cols="30" rows="10">{{$item['content']}}</textarea>
    <input type="submit" value="送信">
</form>
<p>投稿時間: {{$item['created_at']}}</p>

{{-- 下記を追記する --}}
@endsection