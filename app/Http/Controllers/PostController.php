<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
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
        // dd($request);
        
        // Validamos los request recibidos desde el formulario
        $validarDatos = $request->validate([
            'txt_titulo_post' => 'required|min:3|max:50',
            'txt_email_post' => 'required|email',
            'txt_contenido_post' => 'required|min:5|max:250'
        ]);

        // Creamos nueva instancia al modelo POST
        $post = new Post();

        // Configuramos datos a almacenar en DB
        $post->fk_id_user = auth()->id();
        $post->titulo = $validarDatos['txt_titulo_post'];
        $post->email = $validarDatos['txt_email_post'];
        $post->imagen = 'https://images.pexels.com/photos/1714208/pexels-photo-1714208.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940';
        $post->contenido = $validarDatos['txt_contenido_post'];

        // Guardamos cambios
        $post->save();

        // return redirect('/posts');
        return response(json_encode(array('respuesta' => 'OK')),200);
    }
}
