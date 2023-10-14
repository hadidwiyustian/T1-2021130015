@extends('layouts.template')

@section('title', $books->title)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $books->title }}</h1>
        <p class="blog-post-meta">{{ $books->updated_at }}</p>


        <p>{{ $books->body }}</p>
    </article>
@endsection
