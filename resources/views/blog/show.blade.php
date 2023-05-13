@extends('layouts.app')

@section('content')
    
<div class="container my-5">
  <div class="row align-items-start">
    <div class="col"> 
    <div class="pst">
        <img src="{{ asset('images/' . $post->image_path) }}"  class="post-image w-100" alt="">
    </div>
    </div>
    <div class="col">
        <h1>{{ $post->title }}</h1>

        <div>
            <span>By <span>{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}</span>

            <p>{{ $post->description }}</p>
        </div>
</div>
</div>
    

@endsection
