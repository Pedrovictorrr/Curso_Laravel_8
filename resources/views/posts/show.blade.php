<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{$post->title}}</h1>
    <ul>
        <li>
          <strong>Titutlo:</strong>  {{$post->title}}
        </li>
        <li>
            <strong>Conteudo:</strong>{{$post->content}}
        </li>
    </ul>
    <form action="{{route('destroy.post',$post->id)}}" method="POST">
        @csrf 
        <input type="hidden"  name="_method" value="DELETE">
        <button type="submit">Delete</button>

    </form>
</body>
</html>