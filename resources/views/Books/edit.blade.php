@extends('layouts.template')

@section('title', 'Edit Buku')

@section('content')
    <div class="mt-4 p-5 bg-dark text-white rounded">
        <h1>Edit Book</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-6">
            <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-8 col-sm-12">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" class="form-control" name="isbn" value="{{ old('isbn', $book->isbn)}}">
                </div>
                <div class="mb-3 col-md-8 col-sm-12">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" name="judul" value="{{ old('judul', $book->judul)}}">
                </div>
                <div class="mb-3 col-md-8 col-sm-12">
                    <label for="halaman" class="form-label">Halaman</label>
                    <input type="text" class="form-control" name="halaman" value="{{ old('halaman', $book->halaman)}}">
                </div>
                <div class="mb-3 col-md-8 col-sm-12">
                    <label for="kategori" class="form-label">Kategori</label><br>
                    <select name="kategori" id="kategori" class="form-select form-select-lg mb-3">
                        <option value="Uncategorized" {{ $book->kategori === 'Uncategorized' ? 'selected' : ''}}>Uncategorized</option>
                        <option value="Sci-fi" {{ $book->kategori === 'Sci-fi' ? 'selected' : ''}}>Science Fiction</option>
                        <option value="Novel" {{ $book->kategori === 'Novel' ? 'selected' : ''}}>Novel</option>
                        <option value="History" {{ $book->kategori === 'History' ? 'selected' : ''}}>History</option>
                        <option value="Biography" {{ $book->kategori === 'Biography' ? 'selected' : ''}}>Biography</option>
                        <option value="Romance" {{ $book->kategori === 'Romance' ? 'selected' : ''}}>Romance</option>
                        <option value="Education" {{ $book->kategori === 'Education' ? 'selected' : ''}}>Education</option>
                        <option value="Culinary" {{ $book->kategori === 'Culinary' ? 'selected' : ''}}>Culinary</option>
                        <option value="Comic" {{ $book->kategori === 'Comic' ? 'selected' : ''}}>Comic</option>
                    </select>
                </div>
                <div class="mb-3 col-md-8 col-sm-12">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" value="{{ old('penerbit', $book->penerbit)}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
