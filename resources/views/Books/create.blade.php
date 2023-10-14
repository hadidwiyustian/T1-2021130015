@extends('layouts.template')

@section('title', 'Tambah Buku')

@section('content')
    <div class="mt-4 p-5 bg-primary text-white rounded">
        <h1>Book</h1>
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
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 col-md-8 col-sm-12">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" class="form-control" name="isbn" value={{ old('isbn')}}>
                </div>
                <div class="mb-3 col-md-8 col-sm-12">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" name="judul" value={{ old('judul')}}>
                </div>
                <div class="mb-3 col-md-8 col-sm-12">
                    <label for="halaman" class="form-label">Halaman</label>
                    <input type="text" class="form-control" name="halaman" value={{ old('halaman')}}>
                </div>
                <div class="mb-3 col-md-8 col-sm-12">
                    <label for="kategori" class="form-label">Kategori</label><br>
                    <select name="kategori" id="kategori" class="form-select form-select-lg mb-3">
                        <option value="Uncategorized">Uncategorized</option>
                        <option value="Sci-fi">Science Fiction</option>
                        <option value="Novel">Novel</option>
                        <option value="History">History</option>
                        <option value="Biography">Biography</option>
                        <option value="Romance">Romance</option>
                        <option value="Education">Education</option>
                        <option value="Culinary">Culinary</option>
                        <option value="Comic">Comic</option>
                    </select>
                </div>
                <div class="mb-3 col-md-8 col-sm-12">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" value={{ old('penerbit')}}>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
