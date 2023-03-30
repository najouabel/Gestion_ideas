<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index',compact('posts'))
                ->with('i', (request()->input('page',1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }
    public function profile()
    {
        return view('posts.profile');
    }
    public function login()
    {
        return view('posts.login');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'details'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
           $destinationPath = 'images/';
           $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
           $image->move($destinationPath, $profileImage);
           $input['image'] = "$profileImage";
           $input['user_id'] = auth()->id();
        }

        Post::create($input);
        return redirect()->route('posts.index')
        ->with('success','posts added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }
    public function showsignl(Post $post)
    {
        return view('posts.commentaire',['post'=>$post]
        
    );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name'=>'required',
            'details'=>'required', 
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
           $destinationPath = 'images/';
           $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
           $image->move($destinationPath, $profileImage);
           $input['image'] = "$profileImage";
        }else{
            unset( $input['image']);
        }

        $post->update($input);
      
        return redirect()->route('posts.index')
        ->with('success','posts updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
        ->with('success','posts deleted successfully');
    }
}
