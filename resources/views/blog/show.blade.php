@extends('layouts.app')

@section('content')
    
  
        <h1>{{ $post->title }}</h1>

        <div>
            <span>By <span>{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}</span>

            <p>{{ $post->description }}</p>
        </div>

    

@endsection
