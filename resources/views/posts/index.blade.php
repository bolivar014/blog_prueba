@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Agregar Post
                    </button>
                </div>

                <div class="col-md-12">
                    <br>
                    <h1 class="h2">Lista de POST</h1>
                    @foreach ($posts as $post)
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{ $post->titulo }}
                                    </div>
                                    <div class="col-md-6 mr-auto" style="text-align: right;" >
                                        Fecha: {{ substr($post->created_at, 0, 10) }}
                                    </div>
                                </div>
                            </div>                        
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img width="400px" height="250px" src="{{ $post->imagen }}" alt="">
                                    </div>
                                    <div class="col-md-5">
                                        {{ $post->contenido }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>                    
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Modal - CREAR POST -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="#" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 col-md-7">
                                <label for="exampleFormControlInput1" class="form-label">Titulo:</label>
                                <input type="text" class="form-control" id="txt_post" name="txt_post" placeholder="Titulo del post">
                            </div>
                            <div class="mb-3 col-md-7">
                                <label for="exampleFormControlInput1" class="form-label">Email:</label>
                                <input type="text" class="form-control" id="txt_email" name="txt_email" placeholder="name@example.com">
                            </div>
                            <div class="mb-3 col-md-7">
                                <label for="exampleFormControlInput1" class="form-label">Imagen:</label>
                                <input type="file" class="form-control" id="txt_imagen" name="txt_imagen">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Contenido:</label>
                                <textarea class="form-control" id="txt_contenido" rows="3" placeholder="Descripción..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </div>         
                    </form>
                </div>
            </div>
        </div>
    @endsection