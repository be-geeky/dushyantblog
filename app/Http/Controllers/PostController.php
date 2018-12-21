<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {			
		if(Auth::user()){
			$posts = Post::all();
			return view('index', compact('posts')); 
		}
		return view('unauthorized');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate([
			'title'=>'required',		
			'body'=> 'required',        
		]);
		$post = new Post([
			'title' => $request->get('title'),
			'user_id' => Auth::user()->id,
			'body'=> $request->get('body'),        
		]);
		 $post->save();
		 return redirect('/posts')->with('success', 'Post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
		if (Gate::allows('admin-only', auth()->user())) {
            return view('unauthorized');
        }
        return view('show', compact('post'));; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   
		if($post->canUserEdit()){			
			return view('edit', compact('post'));		
		}
		return view('unauthorized', compact('post'));
        

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
        $request->validate([
        'title'=>'required',
        'body'=> 'required',        
      ]);
      
      $post->title = $request->get('title');
      $post->body = $request->get('body');
      $post->save();

      return redirect('/posts')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
     if($post->canUserDelete()){			
		$post->delete();
	 }else{
		return view('unauthorized', compact('post'));	
	 }
     
     return redirect('/posts')->with('success', 'Post has been deleted Successfully');
    }
}
