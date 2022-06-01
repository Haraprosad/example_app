@extends('layout')
@section('banner')
    <h1>Publishing date: {{$post->date}}</h1>
@endsection
@section('content')
    <article>
        <h1>{{$post->title}}</h1>
        {!! $post->body !!}
    </article>
    <a href="/">Go Back</a>
@endsection
