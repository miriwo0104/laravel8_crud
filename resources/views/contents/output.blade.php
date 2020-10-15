<h1>output</h1>

@foreach ($items as $item)
    <hr>
    <p>{{$item['content']}}</p>
@endforeach