@extends('layouts.app')
@section('container')
    <h1 class="mb-5">Post Category : {{ $category }}</h1>
    @foreach($posts as $post)
        <h2>
            <a href="/post/{{ $post->ref_id }}">{{ $post['title']  }}</a>
        </h2>
        <h5>{{ $post['author'] }}</h5>
        <p>{!! $post['body'] !!}</p>
    @endforeach
    @if(sizeof($posts)<1)
        {{--<img src="{{ asset('img/undraw_no_data_re_kwbl.svg') }}" class="rounded mx-auto d-block" alt="no data"
             width="200">--}}
        <h5 class="text-center mt-5">No Data</h5>
    @endif
@endsection

