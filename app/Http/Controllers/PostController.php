<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Read

        $posts = Post::all();
        // dd($posts);
        // $JSONfile = json_encode($posts);
        // dd($JSONfile);
        return view('main',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //CREATE
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
        //CREATE
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if($post){
            //Redirect with Flash message
            return redirect('/post')->with('status', 'Post added Successfully!');
        }
        else{
            return redirect('/post/create')->with('status', 'There was an error!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Read individual
        // $posts = Post::find(3)->get();
        $posts = Post::findOrFail($id);
        return view('show',compact('posts'));
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
        //Update View
        $posts = Post::where('id',$id)->first();
        return view('edit',compact('posts'));
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
        //Update
        $posts = Post::find($id)->first();

        $posts->title = $request->title;
        $posts->body = $request->body;

        if($posts->save()){
            return redirect('/post')->with('status', 'Post edited Successfully!');
        }
        else{
            return redirect('/post/$id/edit')->with('status', 'There was an error');

        }
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
        //Delete
        $posts = Post::find($id);
        if($posts->delete()){
            return redirect('/post')->with('status', 'Post was deleted successfully');
        }
        else return redirect('/post')->with('status', 'There was an error');

        
    }
}
