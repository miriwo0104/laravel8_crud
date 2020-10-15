<h1>detail</h1>

<p>投稿ID: {{$item['id']}}</p>
<p>投稿内容: {{$item['content']}}</p>
<p>投稿時間: {{$item['created_at']}}</p>
{{-- 下記を追記する --}}
<a href="{{route('edit', ['content_id' => $item['id']])}}">編集</a>
