@extends('layouts.app')

@section('content')


<section class="Blog">
    <div class="container-lg mb-lg-5">
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
                        <div class="fw-bold heading">About Restaurant</div>
                    </h1>
                    <h6 class="text-muted fw-bold">By Harsh : 1 Day ago</h6>
                        <p class="lead my-4 para">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate commodi explicabo nemo sed est, 
                            molestias nihil iusto a itaque exercitationem cumque sint odio animi porroWe regret to inform you that your application was refused. Check your messages below for details.<br> 
                        </p>
                        <div class="reserv">
                            <a class="btn btn-lg btn-success" href="#reservation">Keep Reading</a>
                        </div>
                </div>
            </div>
        </div>
      </div>
</section>


<div>
    @yield('content')
</div>
<div>
    @include('layouts.footer')
</div>

@endsection

