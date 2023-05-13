@extends('layouts.app')

@section('content')
<div class="text-center">
    <div>
        <h1>
            Update Post
        </h1>
    </div>
</div>
 
@if ($errors->any())
    <div class=" m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class=" mb-4 text-muted bg-success  py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="pt-5 container">
    <form 
        action="/blog/{{ $post->more }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input 
            type="text"
            name="title"
            value="{{$post->title}}"
            class=" my-5  form-control">

        <textarea 
            name="description"
            placeholder="Description..."
            class="py-5  form-control">{{$post->description}}</textarea>

        <div class="  pt-15">
            <label class="d-flex   items-center px-2 py-3">
                <span class="mt-2  text-base leading-normal">
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
            class="btn mt-15 btn-success ">
            Submit Post
        </button>
    </form>
</div>

@endsection