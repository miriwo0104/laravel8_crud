@extends('layouts.app')

@section('content')

<h1>output</h1>

@foreach ($items as $item)
<hr>
{{-- 下記を追記する --}}
@if (isset($item['file_path']))
<img src="{{asset('storage/' . $item['file_path'])}}" alt="{{asset('storage/' . $item['file_path'])}}">
@endif
{{-- 上記までを追記する --}}
<p>{{$item['content']}}</p>
<a href="{{route('detail', ['content_id' => $item['id']])}}">詳細</a>
<a href="{{route('edit', ['content_id' => $item['id']])}}">編集</a>
@endforeach

@endsection