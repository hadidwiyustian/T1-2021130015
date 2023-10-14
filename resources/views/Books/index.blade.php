@extends('layouts.template')

@section('title', 'Books List')

@section('content')

    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Books</h1>
        {{-- Add button --}}
        <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm">Add New Books</a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($books as $books)
                    <tr>
                        <th scope="row">{{ $books->id }}</th>
                        <td>
                            <a href="{{ route('articles.show', $books) }}">
                                {{ $books->title }}
                            </a>
                        </td>
                        <td>{{ Str::limit($books->body, 50, ' ...') }}</td>
                        <td>{{ $books->created_at }}</td>
                        <td>{{ $books->updated_at }}</td>
                        <td>
                            <a href="{{ route('articles.edit', $books) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('books.destroy', $books) }}" method="POST" class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No books found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $books->links() !!}
        </div>
    </div>
@endsection
