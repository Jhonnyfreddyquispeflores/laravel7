@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Nuevo Post</h1>
    
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <label for="titulo">Título</label>
        <input name="titulo" id="titulo" type="text" class="form-control">
        <label for="contenido">Contenido</label>
        <textarea name="contenido" id="titulo" class="form-control"></textarea>
        <label for="id_autor">Autor</label>
        <select name="id_autor" id="id_autor" class="form-control">
            <option value="vacio">:: Seleccione ::</option>
            @foreach($autores as $autor)
            <option value="{{$autor->id}}">{{$autor->name}} - Correo: {{$autor->email}}</option>
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
        <button class="btn btn-success">AGREGAR</button>
    </form>
</div>
@endsection
