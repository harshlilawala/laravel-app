@extends('layouts.app')

@section('content')
<div class="text-center">
    <div>
        <h1>
            Blog Posts
        </h1>
    </div>
</div>

@if (session()->has('message'))
    <div class="mt-3">
        <p class=" mb-4 text-white bg-primary  py-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif

@if (Auth::check())
    <div class="pt-5 container m-auto">
        <a 
            href="/blog/create"
            class="bg-success text-white  py-3 px-5">
            Create post
        </a>
    </div>
@endif

@foreach ($posts as $post)
<div class="container my-5">
  <div class="row align-items-start">
    <div class="col"> 
        <div class="pst">
            <img src="{{ asset('images/' . $post->image_path) }}"  class="post-image w-100" alt="">
        </div>
    </div>
    <div class="col">
    <h2 class="pb-4">
        {{ $post->title }}
     </h2>

    <span>
        By <span class="font-bold text-muted">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <p class="pt-8 pb-10">
        {{ $post->description }}
    </p>

    <a href="/blog/{{ $post->more }}" class="btn btn-success">
        Keep Reading
    </a>

    @if(isset(Auth::user()->id)&& Auth::user()->id == $post->user_id)
        <a class="btn btn-warning" href="/blog/{{$post->more}}/edit">
            Edit
        </a>

            <span>
                     <form 
                        action="/blog/{{$post->more}}"
                        method="POST">
                        @csrf
                        @method('delete')

                        <button
                            class="btn btn-danger pr-3 mt-3"
                            type="submit">
                            Delete
                        </button>

                    </form>
                </span>
    @endif

            </div>
        </div>
     <div class="d-flex my-5 ">
    {{ $posts->links() }}
    </div>
    </div>
   
    

@endforeach
   
@endsection