<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    // Integrando middleware de auth
    public function __construct() {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ejecutamos query para recuperar los ultimos 10 posts ordenandolos descendente
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        
        // Retornamos la vista de los posts 
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        //
        echo "resp ajax controller";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Recurso para almacenar nuevos post
    public function storePost(Request $request) {
        // Verificamos que llegue la imagen al servidor
        if($request->hasFile('txt_imagen_post')){
            // Recuperamos  binario de la imagen
            $file = $request->file('txt_imagen_post');
            // Ruta donde se almacenara dicha imagen
            $destinationPath = 'images/featureds/';
            // Nombre de la imagen = Fecha - Nombre original
            $fileName = time() . '-' . $file->getClientOriginalName();
            // Movemos archivo a ruta
            $uploadSuccess = $request->file('txt_imagen_post')->move($destinationPath, $fileName);
        }
        
        // Validamos los request recibidos desde el formulario
        $validarDatos = $request->validate([
            'txt_titulo_post' => 'required|min:3|max:50',
            'txt_email_post' => 'required|email',
            'txt_contenido_post' => 'required|min:5|max:255',
            'txt_id_r_post' => 'required'
        ]);
        
        // Creamos nueva instancia al modelo POST
        $post = new Post();

        // Configuramos datos a almacenar en DB
        $post->fk_id_user = $validarDatos['txt_id_r_post'];
        $post->titulo = $validarDatos['txt_titulo_post'];
        $post->email = $validarDatos['txt_email_post'];
        $post->imagen = $destinationPath . $fileName;
        $post->contenido = $validarDatos['txt_contenido_post'];

        // Guardamos cambios
        $post->save();

        // Verificamos que se hubiese realizado almacenamiento de post exitoso
        if($post) {
            return response(json_encode(array('respuesta' => 'OK')),200);
        }
    }
}
