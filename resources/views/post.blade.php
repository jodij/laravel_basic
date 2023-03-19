@extends('layouts.app')
@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">

                <h1 class="mb-3">{{ $post->title }}</h1>
                <p> By. <a href="/authors/{{ $post->author->ref_id }}">{{ $post->author->name  }}</a> in <a
                        href="/posts?category={{ $post->category->ref_id }}">{{ $post->category->name }}</a></p>

                @if($post->image)
                    <div style="max-height: 350px; overflow: hidden;">
                        <img class="img-fluid mt-3"
                             src="{{ asset('storage/' . $post->image) }}"
                             alt="{{ $post->category->name }}">
                    </div>
                @else
                    <img class="img-fluid mt-3"
                         src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}"
                         alt="{{ $post->category->name }}">
                @endif
                <article class="my-3 fs-5">
                    {!! $post["body"] !!}
                </article>
                <a class="d-block mt-5" href="/posts"> Back to Posts</a>
            </div>
        </div>
    </div>
@endsection


