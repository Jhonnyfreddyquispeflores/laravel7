@extends('layouts.app')

@section('content')

<div class="container">
    
    <h1>Lista de POSTS</h1>
    
    <a href="{{ route('post.create') }}" class="btn btn-info btn-sm">Agregar POST</a>
    
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Contenido</th>
                <th>Autor</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $item)
            <tr>
                <td>{{ $item->id_post }}</td>
                <td>{{ $item->titulo }}</td>
                <td>{{ $item->contenido }}</td>
                <td>{{ $item->autor->name }}</td>
                <td>
                    <a href="{{ route('post.edit', $item->id_post )}}" class="btn btn-warning">
                        Editar
                    </a>
                    <form action="{{ route('post.destroy', $item )}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
             </tr>
        @endforeach
        </tbody>
    </table>
    
    {{$posts->render()}}
</div>
@endsection
