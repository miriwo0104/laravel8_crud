{{-- 下記を追記する --}}
@extends('layouts.app')

@section('content')
{{-- 上記までを追記する --}}

<h1>detail</h1>

<p>投稿ID: {{$item['id']}}</p>
<p>投稿内容: {{$item['content']}}</p>
<p>投稿時間: {{$item['created_at']}}</p>
<a href="{{route('edit', ['content_id' => $item['id']])}}">編集</a>
<form action="{{route('delete')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$item['id']}}">
    <input type="submit" value="削除">
</form>

{{-- 下記を追記する --}}
@endsection