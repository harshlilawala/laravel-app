@extends('layouts.app')

@section('content')
<div class="m-auto text-center">
    <div class="py-15">
        <h1 class="text-6xl">
            Create Post
        </h1>
    </div>
</div>
 
@if ($errors->any())
    <div class=" m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class=" mb-4 text-gray-50 bg-danger rounded-2xl py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container m-auto pt-20">
    <form 
        action="/blog"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <input 
            type="text"
            name="title"
            placeholder="Title..."
            class="form-control">

        <textarea 
            name="description"
            placeholder="Description..."
            class="form-control my-4"></textarea>

        <div class="pt-15">
            <label class="w-44 flex flex-col items-center px-2 py-3 bg-success shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                    Select a file
                </span>
                <input 
                    type="file"
                    name="image"
                    class="hidden">
            </label>
        </div>

        <button    
            type="submit"
            class="btn btn-success my-4">
            Submit Post
        </button>
    </form>
</div>

@endsection