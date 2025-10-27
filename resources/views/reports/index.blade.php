@extends('layouts.app')

@section('content')
<h1 class="mb-4">Library Reports</h1>

<div class="row">
    <!-- Books Never Borrowed -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5>Books Never Borrowed</h5>
            </div>
            <div class="card-body">
                @if($neverBorrowedBooks->count() > 0)
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Published Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($neverBorrowedBooks as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author->name }}</td>
                                <td>{{ $book->published_year }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted">All books have been borrowed at least once.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Top 3 Authors -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5>Top 3 Authors by Borrow Count</h5>
            </div>
            <div class="card-body">
                @if($topAuthors->count() > 0)
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Author</th>
                                <th>Total Books Borrowed</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topAuthors as $author)
                            <tr>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->books_count }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted">No borrow records found.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Currently Borrowed Books -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Currently Borrowed Books</h5>
            </div>
            <div class="card-body">
                @if($currentlyBorrowed->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Book Title</th>
                                <th>Author</th>
                                <th>Borrower Name</th>
                                <th>Borrowed At</th>
                                <th>Days Borrowed</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($currentlyBorrowed as $record)
                            <tr>
                                <td>{{ $record->book->title }}</td>
                                <td>{{ $record->book->author->name }}</td>
                                <td>{{ $record->borrower_name }}</td>
                                <td>{{ $record->borrowed_at->format('M d, Y') }}</td>
                                <td>{{ $record->borrowed_at->diffInDays(now()) }} days</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted">No books are currently borrowed.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection