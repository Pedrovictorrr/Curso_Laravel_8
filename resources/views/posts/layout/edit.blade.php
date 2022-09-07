@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif  
<form action="{{route("update.post", $post->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <input type="text" name="title" id="" placeholder="titulo" value='{{$post->title}}'>
    <textarea name="content" id="content"  cols="30" rows="4" placeholder="conteudo">{{$post->content}}</textarea>
    <input type="file" name="image" id="image">
    <button type="submit">enviar</button>
</form>