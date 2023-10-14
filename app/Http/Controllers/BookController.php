<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'isbn' => 'required|numeric|min:1000000000000|max:9999999999999',
            'judul' => 'required|string',
            'halaman' => 'required|numeric|digits_between:1,3',
            'kategori' => 'required',
            'penerbit' => 'required|string',
        ]);

        $book = Book::create([
            'isbn' => $validated['isbn'],
            'judul' => $validated['judul'],
            'halaman' => $validated['halaman'],
            'kategori' => $validated['kategori'],
            'penerbit' => $validated['penerbit'],
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'isbn' => 'required|numeric|min:1000000000000|max:9999999999999',
            'judul' => 'required|string',
            'halaman' => 'required|numeric|digits_between:1,3',
            'kategori' => 'required',
            'penerbit' => 'required|string',
        ]);

        $book->update([
            'isbn' => $validated['isbn'],
            'judul' => $validated['judul'],
            'halaman' => $validated['halaman'],
            'kategori' => $validated['kategori'],
            'penerbit' => $validated['penerbit'],
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil di-update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil di hapus.');
    }
}
