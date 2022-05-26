@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="mb-3 col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">Titulo:</label>
                        <input type="text" class="form-control" id="txt_titulo_post" name="txt_titulo_post" placeholder="Titulo del post" value="{{ $post->titulo }}" disabled>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="exampleFormControlInput1" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="txt_email_post" name="txt_email_post" placeholder="name@example.com" value="{{ $post->email }}" disabled>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card-group">
                        <div class="card">
                            <img class="card-img-top" width="250" height="200" src="http://127.0.0.1:8000/{{ $post->imagen }}" alt="Card image cap">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 col-md-7" style="display: none;">
                        <label for="exampleFormControlInput1" class="form-label">ID:</label>
                        <input type="hidden" class="form-control" id="txt_id_r_post" name="txt_id_r_post" placeholder="Titulo del responsable post" value="{{ auth()->id() }}">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="exampleFormControlTextarea1" class="form-label">Contenido:</label>
                        <textarea class="form-control" id="txt_contenido_post" name="txt_contenido_post" rows="3" placeholder="Descripción..." disabled>{{ $post->contenido }}</textarea>
                    </div>
                </div>
                <div class="col-md-">
                    <a href="{{ url('/admins') }}" class="btn btn-danger">Regresar</a>
                </div>
            </div>
        </div>
    @endsection