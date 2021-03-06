@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Agregar Post
                    </button>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <h1 class="m-0">Completar los siguientes campos del formulario:</h1>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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
                    <form data-action="{{ route('posts.storePost') }}" method="POST" id="formCrearPost" name="formCrearPost" enctype="multipart/form-data" onSubmit="return false;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            
                            <div class="mb-3 col-md-7" style="display: none;">
                                <label for="exampleFormControlInput1" class="form-label">ID:</label>
                                <input type="hidden" class="form-control" id="txt_id_r_post" name="txt_id_r_post" placeholder="Titulo del responsable post" value="{{ auth()->id() }}">
                            </div>
                            <div class="mb-3 col-md-7">
                                <label for="exampleFormControlInput1" class="form-label">Titulo:</label>
                                <input type="text" class="form-control" id="txt_titulo_post" name="txt_titulo_post" placeholder="Titulo del post" value="{{ old('txt_titulo_post') }}">
                            </div>
                            <div class="mb-3 col-md-7">
                                <label for="exampleFormControlInput1" class="form-label">Email:</label>
                                <input type="text" class="form-control" id="txt_email_post" name="txt_email_post" placeholder="name@example.com" value="{{ old('txt_email_post') }}">
                            </div>
                            <div class="mb-3 col-md-7">
                                <label for="exampleFormControlInput1" class="form-label">Imagen:</label>
                                <input type="file" class="form-control" id="txt_imagen_post" name="txt_imagen_post[]" accept=".gif,.jpg,.jpeg,.png,.svg">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Contenido:</label>
                                <textarea class="form-control" id="txt_contenido_post" name="txt_contenido_post" rows="3" placeholder="Descripci??n..." value="{{ old('txt_contenido_post') }}"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="btn_crear_post" name="btn_crear_post">Guardar</button>
                        </div>         
                    </form>
                </div>
            </div>
        </div>
    @endsection