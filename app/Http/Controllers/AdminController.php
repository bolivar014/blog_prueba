<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    // Inicializo middleware de auth
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
        $posts = DB::table('posts')
        ->join('users', 'posts.fk_id_user', '=', 'users.id')
        ->orderBy('created_at', 'desc')
        ->select('posts.id', 'posts.titulo', 'posts.email', 'posts.imagen', 'posts.contenido', 'posts.created_at', 'users.name')
        ->paginate(10);

        // Retornamos vista
        return view('admins.index', [
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Buscamos el registro si existe
        $post = Post::findOrFail($id);

        return view('admins.show', [
            'post' => $post
        ]);
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
        // dd($id);

        // Buscamos el registro si existe
        $post = Post::findOrFail($id);

        // Ejecutamos la eliminación del registro
        $post->delete();
    }
}
