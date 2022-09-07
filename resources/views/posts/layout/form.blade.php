@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif  
<form action="{{route("store.post")}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" id="" placeholder="titulo" value='{{old('title')}}'>
    <textarea name="content" id="content" cols="30" rows="4" placeholder="conteudo"></textarea>
    <input type="file" name="image" id="image">
    <button type="submit">enviar</button>
</form>