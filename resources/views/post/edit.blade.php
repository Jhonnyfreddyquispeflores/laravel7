@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Editar Post</h1>
    
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="{{route('post.update', ['post'=>$post->id_post])}}" method="post">
        @method('PUT')
        @csrf
        <label for="titulo">Título</label>
        <input name="titulo" id="titulo" type="text" value="{{ $post->titulo }}" class="form-control">
        <label for="contenido">Contenido</label>
        <textarea name="contenido" id="titulo" class="form-control">{{ $post->contenido }}</textarea>
        <label for="id_autor">Autor</label>
        <select name="id_autor" id="id_autor" class="form-control">
            @foreach($autores as $autor)
            <option value="{{$autor->id}}"
                    @if($autor->id == $post->id_autor)
                        selected
                    @endif
                    >{{$autor->name}} {{$autor->email}}</option>
            @endforeach
        </select>
        <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Captcha</label>
            <div class="col-md-6">
                {!! app('captcha')->display() !!}
                @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <hr>
        <button class="btn btn-success">EDITAR</button>
    </form>
</div>
@endsection
