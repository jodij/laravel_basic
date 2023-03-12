@extends('dashboard.layout.app')
@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <a class="btn btn-success btn-sm" href="/dashboard/posts">
                    <span data-feather="arrow-left"></span> Back to all My Posts</a>
                <a class="btn btn-warning btn-sm" href="#"><span data-feather="edit"></span> Edit</a>
                <a class="btn btn-danger btn-sm" href="#"><span data-feather="x-circle"></span> Delete</a>

                <img class="img-fluid mt-3"
                     src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}"
                     alt="{{ $post->category->name }}">
                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection
