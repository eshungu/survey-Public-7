<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home(){
      return view('vueApp');
    }

    //"http://localhost:8000/posts" hits here on this method
    //even "http://localhost:8000/" hits here
    public function index()
    {
      
      return Post::orderBy('id','DESC')->get();

      //return view ('vueApp')->with(Post::orderBy('id','DESC')->get());
      
      //->compact(Post::orderBy('id','DESC')->get());

    }

    public function Listposts(){
      //return view('Listposts');
      return Post::orderBy('id','DESC')->get();
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

    public function add(Request $request){
      return Post::create((array)$request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'title' => 'required',
          'body' => 'required'
        ]);
        $create = Post::create($request->all());
        return response()->json(['status'=> 'success', 'msg'=>'post created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Post::findOrFail($id);
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
        $this->validate($request,[
          'title' => 'required',
          'body' => 'required'
        ]);

        $post = Post::find($id);
        
        if($post->count()){
          $post->update($request->all());
          return response()->json(['status'=>'success','msg'=>'Post update successfully']);
        } else {
          return response()->json(['status'=>'error','msg'=>'erro update post']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);
      if($post->count()){
        $post->delete();
        return response()->json(['status'=>'success','msg'=>'Post delete successfully']);
      } else {
        return response()->json(['status'=>'error','msg'=>'erro delete post']);
      }
    }
}
