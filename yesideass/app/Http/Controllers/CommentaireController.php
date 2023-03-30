<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Commentaire;


class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Commentaire::create([
            'body' => $request->input('body'),
            'user_id' => auth()->user()->id,
            'post_id' => $request->input('post_id'),

        ]);
        return redirect("/posts/commentaire/".$request->input('post_id'));
        // return view('posts.commentaire');
    }
    public function showcommentaire(string $id)
    {
       return view('posts.commentaire')->with('post',Post::where('id',$id));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('posts.commentaire');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
