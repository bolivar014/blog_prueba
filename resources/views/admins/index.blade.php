@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1>Bienvenidos a la vista admin</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Creado Por</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Fecha Publicación</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->titulo }}</td>
                                    <td>{{ substr($post->created_at, 0, 16) }}</td>
                                    <td><a href="/admins/{{ $post->id }}"><i class="fa-solid fa-eye" style="color: green;"></i></a> <a href="#" onclick="confirmarEliminarPost({{ $post->id }});"><i class="fa-solid fa-trash-can" style="color: Red;"></i></a></td>
                                </tr>    
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    @endsection