@extends('layouts.app')

@section('content')


<section class="Blog">
    <div class="container-lg mb-lg-5">
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

                   
                        <!-- <span class=" fw-bold">By  <span class="fw-bold text-muted">{{ $post->user->name ?? 'None'}}</span>1 day ago </span> -->
                        
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

