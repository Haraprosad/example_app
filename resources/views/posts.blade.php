@extends('layout')

@section('banner')
    <h1>My Blog Main Page</h1>
@endsection
@section('content')
    @foreach($posts as $post)
        <article>
            <h1><a href="post/{{$post->slug}}">{{$post->title}}</a></h1>
            <p>{!! $post->body !!}</p>
        </article>
    @endforeach
@endsection



