@extends('layouts.app')

@section('content')
<div class=" m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Blog Posts
        </h1>
    </div>
</div>

@if (session()->has('message'))
    <div class=" m-auto mt-10 pl-2">
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
    <h2 class="text-gray-700 font-bold text-5xl pb-4">
                    {{ $post->title }}
     </h2>

    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
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


                <!-- @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                    <span class="float-right">
                        <a 
                            href="/blog/{{ $post->slug }}/edit"
                            class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                            Edit
                        </a>
                    </span>

                    <span class="float-right">
                        <form 
                            action="/blog/{{ $post->slug }}"
                            method="POST">
                            @csrf
                            @method('delete')

                            <button
                                class="text-red-500 pr-3"
                                type="submit">
                                Delete
                            </button>

                        </form>
                    </span>
                @endif -->
                </div>
            </div>
        </div>  
    </div>  
@endforeach

@endsection