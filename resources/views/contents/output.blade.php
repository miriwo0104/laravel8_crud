{{-- 下記を追記する --}}
@extends('layouts.app')

@section('content')
{{-- 上記までを追記する --}}

<h1>output</h1>

@foreach ($items as $item)
<hr>
<p>{{$item['content']}}</p>
<a href="{{route('detail', ['content_id' => $item['id']])}}">詳細</a>
<a href="{{route('edit', ['content_id' => $item['id']])}}">編集</a>
@endforeach

{{-- 下記を追記する --}}
@endsection