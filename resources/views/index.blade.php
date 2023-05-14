@extends('layouts.app')

@section('content')

@endsection
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Restaurant Review</title>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,300&family=Oswald:wght@200;300;400&family=Playfair+Display:ital,wght@1,700&family=Roboto+Flex:opsz@8..144&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
   <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </head>
<body>
    <!--  -->
<section class="bg-success">
    <nav class="navbar navbar-expand-lg container">
        <div class="container-fluid ">
            <a class="navbar-brand cwhite" href="#">Swansea Restaurant</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse wnav" id="navbarNavDropdown">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link  cwhite " aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link cwhite" href="/blog">Blog</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link cwhite" href="/menu">Menu</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link cwhite" href="/login">Login</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link cwhite" href="/register">Register</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
</section>
<!-- **********Canvas********** -->
<div>
        @yield('content')
</div>
<div>
    @include('layouts.carasoule')
</div>
<!-- ******************Blog******************** -->
<div>
        @yield('content')
</div>
<div>
    @include('layouts.blog')
</div>

<!--************************** Footer ***********************************-->
<div>
    @yield('content')
</div>
<div>
    @include('layouts.footer')
</div>
    <!-- ********************************************************************* -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
     @yield("scripts")
</body>

</html>

    