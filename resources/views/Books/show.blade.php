@extends('layouts.template')

@section('title', $book->judul)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $book->judul }}</h1>
        <p>No ISBN: {{ $book->isbn }}</p>
        <p>Penerbit Buku: {{ $book->penerbit }}</p>
        <p>Kategori Buku: {{ $book->kategori }}</p>
        <p>Jumlah Halaman Buku: {{ $book->halaman }}</p>
        <p>Di update pada: {{ $book->updated_at }}</p>
    </article>
@endsection
