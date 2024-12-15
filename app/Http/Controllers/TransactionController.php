<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index()
    {
        $transactions = Transaction::with(['user', 'book'])->get();
        return view('pages.dashboard.reports', compact('transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
        ]);

        $book = Book::find($request->book_id);

        if ($book->stock > 0) {
            Transaction::create([
                'user_id' => $request->user_id,
                'book_id' => $request->book_id,
                'borrow_date' => $request->borrow_date,
                'status' => 'borrowed',
            ]);

            $book->decrement('stock');
            return redirect()->back()->with('success', 'Berhasil meminjam buku!');
        } else {
            return redirect()->back()->with('error', 'Stok buku habis!');
        }
    }

    public function returnBook($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update(['status' => 'returned', 'return_date' => now()]);

        $book = Book::find($transaction->book_id);
        $book->increment('stock');

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan!');
    }
}
