<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BorrowRecord;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAuthors = Author::count();
        $totalBooks = Book::count();
        $totalBorrowed = BorrowRecord::whereNull('returned_at')->count();

        return view('dashboard', compact('totalAuthors', 'totalBooks', 'totalBorrowed'));
    }
}