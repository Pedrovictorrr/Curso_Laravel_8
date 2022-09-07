<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('search.post')}}" method="post">
        @csrf 
        <input type="text" name="search" placeholder="Filtrar">
        <button type="submit">Buscar</button>
    </form>
    <hr>
    @foreach($posts as $post)
        <p>{{$post->title}} [<a href="{{route('show.post',$post->id)}}">Ver detalhes</a> / <a href="{{route('edit.post',$post->id)}}">Editar</a>]</p>
    @endforeach
    <hr>
    @if (isset($filters))
        {{$posts->appends($filters)->links()}}
    @else
        {{$posts->links()}}
    @endif
    
    @if (session('message'))
    <div>
        {{session('message')}}
    </div>
        @endif

</body>
</html>