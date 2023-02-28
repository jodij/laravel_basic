@extends('layouts.app')
@section('container')
    <h1 class="mb-5">Halaman Post</h1>
    @foreach($posts as $post)
        <article class="mb-4 border-bottom pb-3">
            <h2><a class="text-decoration-none" href="/post/{{ $post->ref_id }}">{{ $post['title']  }}</a></h2>
            <p>By. <a class="text-decoration-none" href="javascript:void(0)">{{ $post->user->name }}</a> in <a class="text-decoration-none" href="/categories/{{ $post->category->ref_id }}">{{ $post->category->name }}</a></p>
            <h5>{{ $post['author'] }}</h5>
            <p>{!! $post['body'] !!}</p>
            <a class="text-decoration-none" href="/post/{{ $post->ref_id }}">Read more..</a>
        </article>
    @endforeach
    @if(sizeof($posts)<1)
        {{--<img src="{{ asset('img/undraw_no_data_re_kwbl.svg') }}" class="rounded mx-auto d-block" alt="no data"
             width="200">--}}
        <h5 class="text-center mt-5">No Data</h5>
    @endif
@endsection

