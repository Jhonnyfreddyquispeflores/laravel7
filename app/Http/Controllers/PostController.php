<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$posts=Post::All();
        $posts=Post::paginate(5);
        return view('post.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $autores=User::All();
        return view('post.create',['autores'=>$autores]);
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
        //dd($request->all());//Print
        $request->validate([
            'titulo'=>'required',
            'id_autor'=>'required|integer',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        
        Post::create([
            'titulo'=>$request->titulo,
            'contenido'=>$request->contenido,
            'id_autor'=>$request->id_autor
        ]);
        
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $autores=User::All();
        return view('post.edit',['post'=>$post, 'autores'=>$autores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        //dd($request->all());//Print
        $request->validate([
            'titulo'=>'required',
            'id_autor'=>'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        
        $post->titulo=$request->titulo;
        $post->contenido=$request->contenido;
        $post->id_autor=$request->id_autor;
        $post->save();
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        //dd($post);
        $post->delete();
        return redirect(route('post.index'));
    }
}
