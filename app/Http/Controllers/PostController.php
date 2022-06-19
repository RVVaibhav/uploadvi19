<?php

namespace Vision\Http\Controllers;

use Vision\Post;
use Vision\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Storage;
use Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $coins = $request->coins ? $request->coins : 0;
        $filter = $request->filter ? $request->filter : 'all';
        $users = [];
        switch($filter){
            case "all":
                $users = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                    $q->where('is_bot',1);
                })->has('userlastpost')->get();
            break;
            case "1":
                $users = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                    $q->where('is_bot',1)->where('level_id', 1);
                })->has('userlastpost')->get();
            break;
            case "2":
                $users = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                    $q->where('is_bot',1)->where('level_id', 2);
                })->has('userlastpost')->get();
            break;
            case "3":
                $users = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                    $q->where('is_bot',1)->where('level_id', 3);
                })->has('userlastpost')->get();
            break;
            case "verified":
                $users = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                    $q->where('verification',"!=","Not Verified");
                })->has('userlastpost')->get();
            break;
            case "primary":
                $users = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                    $q->where('is_primary',1);
                })->has('userlastpost')->get();
            break;
            case "Male":
                $users = User::with(['userDetails','userlastpost'])->where('gender',"Male")->has('userlastpost')->get();
            break;
            case "Female":
                $users = User::with(['userDetails','userlastpost'])->where('gender',"Female")->has('userlastpost')->get();
            break;
            case "VideoCall":
                $users = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                    $q->where('status',"Video");
                })->has('userlastpost')->get();
            break;
            case "AudioCall":
                $users = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                    $q->where('status',"Audio");
                })->has('userlastpost')->get();
            break;
        }
        return view('posts.index')->with('posts', $users);
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
     * @param  \Vision\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Vision\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Vision\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Vision\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function userPost(Request $request)
    {
        // $validatedData = $request->validate([
        //     'file' => 'required|image|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv|max:20000',
        //     'message' => 'required',
        // ]);
        $validatedData = $request->validate([
            'file' => 'required|max:10240',
            'message' => 'required',
        ]);
        if($user = Auth::id() && $request->file('file')){
            $file = $request->file('file');
            $mime = $file->getMimeType();
            $user = Auth::user();
            $path = Storage::put('user/'.$user->id.'/post',  $file, 'public');
            // $path = $file->store('user/'.$user.'/post');
            $post = new Post();
            $post->user_id =  $user->id;
            $post->file_type = $mime;
            $post->filename = $path;
            $post->message = $request->input('message');
            $post->save();
            $post['status'] = "success";
            return response()->json($post);
        }else{
            return response()->json(['error' => 'invalid_request'], 422);
        }
    }
    public function getUsersPosts(Request $request)
    {
        $offset = $request->offset ? $request->offset : 0;
        $limit = $request->limit ? $request->limit : 10;
        $user_id = $request->userid ? $request->userid : null;;
        $userpost = [];

        if(!$user_id){
            $user_id = Auth::id();
        }
        $posts = Post::where('user_id', $user_id)->skip($offset)->take($limit)->get();
        foreach ($posts as $key => $post) {
            $post['filename'] = env('STORAGE_BASE_URL').$post['filename'];
        }
        return response()->json($posts);
    }
}
