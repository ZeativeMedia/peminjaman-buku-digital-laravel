<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $borrowed = $user->borrowedTransactions()->with('book')->get();

        $books = Book::all();
        foreach ($books as $book) {
            $book->cover_url = asset('storage/' . $book->cover);
        }
        return view('pages.dashboard.main', compact(['books', 'borrowed']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'cover' => 'required|image',
            'year_published' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        $coverPath = $request->file('cover')->store('covers', 'public');

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'cover' => $coverPath,
            'year_published' => $request->year_published,
            'stock' => $request->stock,
        ]);

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'cover' => 'nullable|image',
            'year_published' => 'required|integer',
            'stock' => 'required|integer',
        ]);


        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->year_published = $request->year_published;
        $book->stock = $request->stock;

        if ($request->hasFile('cover')) {
            if (file_exists(public_path('storage/' . $book->cover))) {
                unlink(public_path('storage/' . $book->cover));
            }
            $coverPath = $request->file('cover')->store('covers', 'public');
            $book->cover = $coverPath;
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Buku berhasil dihapus!');
    }
}
