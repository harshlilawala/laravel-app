<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index()
    {   
        return view('blog.index')
        ->with('posts',Post::orderBy('updated_at','DESC')->get());
    }

}
