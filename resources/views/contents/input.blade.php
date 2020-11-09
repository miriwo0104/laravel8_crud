{{-- 下記を追記する --}}
@extends('layouts.app')

@section('content')
{{-- 上記までを追記する --}}

<h1>input</h1>

<!-- 下記を修正 -->
<form action="{{route('save')}}" method="post">
    @csrf
    <textarea name="content" cols="30" rows="10"></textarea>
    <input type="submit" value="送信">
</form>

{{-- 下記を追記する --}}
@endsection