@extends('dashboard.layout.app')
@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <a class="btn btn-success btn-sm" href="/dashboard/posts">
                    <span data-feather="arrow-left"></span> Back to all My Posts
                </a>
                <a class="btn btn-warning btn-sm" href="/dashboard/posts/{{ $post->ref_id }}/edit">
                    <span data-feather="edit"></span> Edit
                </a>
                <form action="/dashboard/posts/{{ $post->ref_id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">
                        <span data-feather="x-circle"></span> Delete
                    </button>
                </form>

                @if($post->image)
                    <img class="img-fluid mt-3"
                         src="{{ asset('storage/' . $post->image) }}"
                         alt="{{ $post->category->name }}">
                @else
                    <img class="img-fluid mt-3"
                         src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}"
                         alt="{{ $post->category->name }}">
                @endif

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection
