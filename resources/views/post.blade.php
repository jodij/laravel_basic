@extends('layouts.app')
@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">

                <h1 class="mb-3">{{ $post->title }}</h1>
                <p> By. <a href="/authors/{{ $post->author->ref_id }}">{{ $post->author->name  }}</a> in <a
                        href="/categories/{{ $post->category->ref_id }}">{{ $post->category->name }}</a></p>

                <img class="img-fluid" src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}"
                     alt="{{ $post->category->name }}">
                <article class="my-3 fs-5">
                    {!! $post["body"] !!}
                </article>
                <a class="d-block mt-5" href="/posts"> Back to Posts</a>
            </div>
        </div>
    </div>
@endsection


