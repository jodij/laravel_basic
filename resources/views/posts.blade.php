
@extends('layouts.app')
@section('container')
    <h1>Halaman Post</h1>

    @foreach($posts as $post)
        <h2>
            <a href="/post/{{ $post->ref_id }}">{{ $post['title']  }}</a>
        </h2>
        <h5>{{ $post['author']  }}</h5>
        <p>{{ $post['body']  }}</p>
    @endforeach
@endsection
