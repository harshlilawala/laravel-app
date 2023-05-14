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
<div class="comment-area mt-4">

    @if(session('massage'))
        <h6 class="alert alert-warning mb-3">{{session('massage')}}</h6>
    @endif

    <div class="card card-body">
        <form action="{{url('comments')}}" method="POST">
            <h6 class="card-title">Leave a comment</h6>
                
                @csrf
                <input type="hidden" name="post_more" value="{{ $post->more }}">
                <textarea name="comment_body" class="form-control w-50" rows="3" required></textarea> <button type="submit" class="btn btn-success mt-3">Post</button>
        </form>
    </div>

    @forelse ($post->comments as $comment)

    
<div class="card card-body shadow-sm mt-3">
    <div class="detail-area">
        <h6 class="user-name mb-1">
            @if ($comment->user)
            {{ $comment->user->name }}
            @endif
            <small class="ms-3 text-muted">Commented on: {{ $comment->created_at->format('d-m-y') }}</small>
        </h6>
            <p class="user-comment mb-1">
                {!! $comment->comment_body !!}
                
            </p>
    </div>
    
</div>
            @empty
                <h6>No comments yet</h6>
            @endforelse
</div>
    

@endsection
