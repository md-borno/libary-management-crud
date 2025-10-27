<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\BorrowRecord;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    public function index()
    {
        // Books never borrowed
        $neverBorrowedBooks = Book::whereDoesntHave('borrowRecords')->get();

        // Top 3 authors by borrow count
        $topAuthors = Author::withCount(['books' => function($query) {
            $query->join('borrow_records', 'books.id', '=', 'borrow_records.book_id')
                //   ->select(\DB::raw('count(distinct borrow_records.id)'));
                ->select(\Illuminate\Support\Facades\DB::raw('count(distinct borrow_records.id)'));
        }])->orderByDesc('books_count')
           ->limit(3)
           ->get();

        // Currently borrowed books
        $currentlyBorrowed = BorrowRecord::with('book.author')
            ->whereNull('returned_at')
            ->get();

        return view('reports.index', compact(
            'neverBorrowedBooks',
            'topAuthors',
            'currentlyBorrowed'
        ));
    }
}