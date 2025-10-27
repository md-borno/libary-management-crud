<?php

namespace App\Http\Controllers;

use App\Models\BorrowRecord;
use App\Models\Book;
use Illuminate\Http\Request;

class BorrowRecordController extends Controller
{
    public function index()
    {
        $borrowRecords = BorrowRecord::with('book.author')->get();
        return view('borrow-records.index', compact('borrowRecords'));
    }

    public function create()
    {
        $books = Book::all();
        return view('borrow-records.create', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrower_name' => 'required|string|max:255',
            'borrowed_at' => 'required|date',
        ]);

        BorrowRecord::create($request->all());

        return redirect()->route('borrow-records.index')->with('success', 'Borrow record created successfully.');
    }

    public function edit(BorrowRecord $borrowRecord)
    {
        $books = Book::all();
        return view('borrow-records.edit', compact('borrowRecord', 'books'));
    }

    public function update(Request $request, BorrowRecord $borrowRecord)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrower_name' => 'required|string|max:255',
            'borrowed_at' => 'required|date',
            'returned_at' => 'nullable|date',
        ]);

        $borrowRecord->update($request->all());

        return redirect()->route('borrow-records.index')->with('success', 'Borrow record updated successfully.');
    }

    public function destroy(BorrowRecord $borrowRecord)
    {
        $borrowRecord->delete();
        return redirect()->route('borrow-records.index')->with('success', 'Borrow record deleted successfully.');
    }

    public function returnBook(BorrowRecord $borrowRecord)
    {
        $borrowRecord->update(['returned_at' => now()]);
        return redirect()->route('borrow-records.index')->with('success', 'Book marked as returned.');
    }
}