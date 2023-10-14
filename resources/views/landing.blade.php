@extends('layouts.template')

@section('title', 'Perpustakaan STMIK LIKMI')

@section('content')
    @if ($featured)
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="row mb-2">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">{{ $featured->judul }}</h1>
                <p class="lead my-3">{{ $featured->penerbit }}</p>
                <p class="lead mb-0">
                    <a href="{{ route('books.show', $featured) }}" class="text-white fw-bold">
                        Continue reading...
                    </a>
                </p>
            </div>
        </div>
    </div>
    @endif

    <div class="row mb-2">
        @forelse ($books as $book)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">{{ $book->penerbit }}</strong>
                        <h3 class="mb-0">{{ $book->judul }}</h3>
                        <div class="mb-1 mt-2 text-muted">ISBN: {{ $book->isbn }}</div>
                        <p class="card-text mb-auto">Category: <b>{{ $book->kategori }}</b></p>
                        <div class="mb-1 text-muted">{{ $book->updated_at }}</div>
                        <a href="{{ route('books.show', $book) }}" class="stretched-link">Continue reading</a>
                    </div>
                </div>
            </div>

        @empty
            <div class="col-md-12">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h2 class="card-text mb-auto">No books found.</h2>
                    </div>
                </div>
            </div>
        @endforelse

        {{ $books->links() }}
    </div>
@endsection
