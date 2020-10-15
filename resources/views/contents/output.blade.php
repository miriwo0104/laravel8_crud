<h1>output</h1>

@foreach ($items as $item)
    <hr>
    <p>{{$item['content']}}</p>
    {{-- 下記を追記する --}}
    <a href="{{route('detail', ['content_id' => $item['id']])}}">詳細</a>
    <a href="{{route('edit', ['content_id' => $item['id']])}}">編集</a>
@endforeach