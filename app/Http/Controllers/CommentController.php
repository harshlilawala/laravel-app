<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\comments;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $validator = validator::make($request->all(),[
                'comment_body' => 'required|string'
            ]);
            if ($validator->fails()){
                return redirect()-back()->with('message', 'comment area is mandatory');
            }

            $post = Post::where('more',$request->post_more)->first();
            if($post)
            {
                comments::create([
                    'post_id'=> $post->id,
                    'user_id'=> Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);
                return redirect()->back()->with('message','commented successfully');
            }
            else
            {
                return redirect()->back()->with('message','No such post found');
            }
        }
        else
        {
           return redirect()->back()->with('message','Login First For Comment');
        }
    }
    public function destroy(Request $request)
    {
        if(Auth::check())
        {
            $comment = comment::where('id',$request->comment_id)
                        ->where('user_id',Auth::user()->id)->first();
            $comment ->delete();
             return response()->json([
             'statuse' => 200,
            'massage' => 'deleted successfully'
            ]);
        }   
        else
        {
            return response()->json([
                'statuse' => 401,
                'massage' => 'Login to delete this comment'
            ]);
        }
    }
}

