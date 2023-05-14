<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Notifications\NewPostNotification;

class PostsController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('blog.index')
        //     ->with('posts', Post::orderBy('updated_at','DESC')->get());
        $posts = Post::orderBy('updated_at', 'DESC')->paginate(1);
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
        
        
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);
        $user = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'more' => SlugService::createSlug(Post::class, 'more', $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);
        
       
        
        return redirect('/blog')
        ->with('message', 'Your post has been added!');
       
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($more)
    {
        
        return view('blog.show')
        ->with('post', Post::where('more', $more)->first());
    }
   

    public function edit($more){
        return view('blog.edit')
        ->with('post',Post::Where('more',$more)->first());
    }

    public function update(Request $request, $more)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::where('more', $more)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'more' => SlugService::createSlug(Post::class, 'more', $request->title),
                'user_id' => auth()->user()->id
            ]);

        return redirect('/blog')
            ->with('message', 'Your post has been updated!');
    }

    public function destroy($more)
    {
        $post = Post::where('more', $more);
        $post->delete();

        return redirect('/blog')
            ->with('message', 'Your post has been deleted!');
    }

}

