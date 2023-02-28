@extends('layouts.app')
@section('container')
    <article>
        <h1 class="mb-5">{{ $post->title }}</h1>
        <p> By. Jodi Jonathan in <a href="/categories/{{ $post->category->ref_id }}">{{ $post->category->name }}</a></p>
        {!! $post["body"] !!}
    </article>
    <a href="/post"> Back to Posts</a>
@endsection
