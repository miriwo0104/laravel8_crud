@extends('layouts.app')

@section('content')

<h1>input</h1>

{{-- 下記を修正する --}}
<form action="{{route('save')}}" method="post" enctype="multipart/form-data">
    @csrf
    <textarea name="content" cols="30" rows="10"></textarea>
    {{-- 下記を追記する --}}
    <br>
    @error('file')
        {{$message}}
        <br>
    @enderror
    <input type="file" name="file">
    {{-- 上記までを追記する --}}
    <input type="submit" value="送信">
</form>

@endsection