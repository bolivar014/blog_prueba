@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1 class="h2">Agregar nuevo Post</h1>
                    <form action="#" method="POST">
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
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <button type="button" class="btn btn-primary">Guardar</button>
                            </div>
                            <div class="mb-3 col-md-6">
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>

                <hr>

                <div class="col-md-12">
                    <h1 class="h2">Lista de POST</h1>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    Titulo
                                </div>
                                <div class="col-md-6 mr-auto" style="text-align: right;" >
                                    Fecha: 2022-01-12
                                </div>
                            </div>
                        </div>                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img width="400px" src="https://images.pexels.com/photos/1714208/pexels-photo-1714208.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                                </div>
                                <div class="col-md-5">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    @endsection