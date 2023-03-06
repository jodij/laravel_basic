@extends('layouts.app')
@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="button" id="button-addon2">Button</button>
                </div>
            </form>
        </div>
    </div>
    @if($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/random/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
                 alt="...">
            <div class="card-body text-center">
                <h3 class="card-title"><a class="text-decoration-none text-dark"
                                          href="/posts/{{ $posts[0]->ref_id }}">{{ $posts[0]->title  }}</a></h3>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <p>
                    <small class="text-muted">
                        By. <a class="text-decoration-none"
                               href="/authors/{{ $posts[0]->author->ref_id }}">{{ $posts[0]->author->name }}</a>
                        in <a class="text-decoration-none"
                              href="/categories/{{ $posts[0]->category->ref_id }}">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <a class="text-decoration-none btn btn-primary" href="/posts/{{ $posts[0]->ref_id }}">Read more</a>
            </div>
        </div>


        <div class="container">
            <div class="row">
                @foreach($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute bg-dark px-3 py-2 text-white opacity-75">
                                <a class="text-white text-decoration-none"
                                   href="/categories/{{ $posts[0]->category->ref_id }}">{{ $post->category->name }}</a>
                            </div>
                            <img src="https://source.unsplash.com/random/500x400?{{ $post->category->name }}"
                                 class="card-img-top" alt="{{ $post->category->name }}">
                            <div class="card-body">
                                <h5 class="card-title"><a class="text-decoration-none"
                                                          href="/posts/{{ $post->ref_id }}">{{ $post['title']  }}</a>
                                </h5>
                                <p>
                                    <small class="text-muted">
                                        By. <a class="text-decoration-none"
                                               href="/authors/{{ $post->author->ref_id }}">{{ $post->author->name }}</a>
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $post->excerp }}</p>
                                <a href="/posts/{{ $post->ref_id }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif
@endsection

