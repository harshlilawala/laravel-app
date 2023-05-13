@extends('layouts.app')

@section('content')


<section class="Blog">
    <div class="container-lg mb-lg-5">
    
@if (session()->has('message'))
    <div class="col-2 py-3">
        <p class="ps-2 text-white fw-bold bg-success">
            {{ session()->get('message') }}
        </p>
    </div>
@endif

    @if (Auth::check())
        <div class="py-3 fw-bold">
            <a href="/blog/create" class=" btn btn-lg btn-success px-2 text-white">Create Post</a>
        </div>
    @endif
    @foreach ($posts as $post)
        <div class="row g-2">
            <div class="col-lg-6">
                <div class="py-lg-5 pad">
                    <div class="bimg">
                        <img src="assets\g8.jpg" class="d-block w-100" alt="photo">
                    </div>
                   
                </div>
          </div>

        <div class="col-lg-6 g-5 mt-0 py-lg-4">
                <div class="py-lg-5">
                    <h1>
                        <div class="fw-bold heading">{{ $post->title}}</div>
                    </h1>
             <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
            </span>

                   
                       
                        
                        <p class="lead my-4 para">
                           {{ $post->description}}<br> 
                        </p>
                        <div class="reserv">
                            <a class="btn btn-lg btn-success" href="/blog/ {{ $post->more}}">Keep Reading</a>
                        </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
            
</section>


<div>
    @yield('content')
</div>
<div>
    @include('layouts.footer')
</div>

@endsection

