<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;
use Redirect,Response;

class PostController extends Controller
{
    //

    public function index()
    {
        //
        $data['posts'] = PostModel::orderBy('id','desc')->paginate(8);
   
        return view('welcome',$data);
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
        $postID = $request->post_id;
        $post   =   PostModel::updateOrCreate(['id' => $postID],
                    ['title' => $request->title, 'body' => $request->body]);
    
        return Response::json($post);
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
        $where = array('id' => $id);
        $post  = PostModel::where($where)->first();
 
        return Response::json($post);
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
        $post = PostModel::where('id',$id)->delete();
   
        return Response::json($post);
    }
}
