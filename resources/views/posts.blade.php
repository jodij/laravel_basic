@extends('layouts.app')
@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if(request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                           value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    @if($posts->count())
        <div class="container">
        <div class="card shadow mb-3">
            @if($posts[0]->image)
                <div style="max-height: 350px; overflow: hidden;">
                    <img class="card-img-top"
                         src="{{ asset('storage/' . $posts[0]->image) }}"
                         alt="{{ $posts[0]->category->name }}">
                </div>
            @else
                <img class="card-img-top"
                     src="https://source.unsplash.com/random/1200x400?{{ $posts[0]->category->name }}"
                     alt="{{ $posts[0]->category->name }}">
            @endif
            <div class="card-body text-center">
                <h3 class="card-title"><a class="text-decoration-none text-dark"
                                          href="/posts/{{ $posts[0]->ref_id }}">{{ $posts[0]->title  }}</a></h3>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <p>
                    <small class="text-muted">
                        By. <a class="text-decoration-none"
                               href="/posts?author={{ $posts[0]->author->ref_id }}">{{ $posts[0]->author->name }}</a>
                        in <a class="text-decoration-none"
                              href="/posts?category={{ $posts[0]->category->ref_id }}">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <a class="text-decoration-none btn btn-primary" href="/posts/{{ $posts[0]->ref_id }}">Read more</a>
            </div>
        </div>
        </div>


        <div class="container">
            <div class="row">
                @foreach($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card shadow">
                            <div class="position-absolute bg-dark px-3 py-2 text-white opacity-75">
                                <a class="text-white text-decoration-none"
                                   href="/posts?category={{ $post->category->ref_id }}">{{ $post->category->name }}</a>
                            </div>
                            @if($post->image)
                                <div style="max-height: 400px; overflow: hidden;">
                                    <img class="card-img-top"
                                         src="{{ asset('storage/' . $post->image) }}"
                                         alt="{{ $post->category->name }}">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/random/500x400?{{ $post->category->name }}"
                                     class="card-img-top" alt="{{ $post->category->name }}">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title text-truncate"><a class="text-decoration-none"
                                                          href="/posts/{{ $post->ref_id }}">{{ $post['title']  }}</a>
                                </h5>
                                <p>
                                    <small class="text-muted">
                                        By. <a class="text-decoration-none"
                                               href="/posts?author={{ $post->author->ref_id }}">{{ $post->author->name }}</a>
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

    <div class="container mb-3">
        {{ $posts->links() }}
    </div>

@endsection

