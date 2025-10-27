@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Book Details</h4>
            </div>
            <div class="card-body">
                <h5>{{ $book->title }}</h5>
                <p><strong>Author:</strong> {{ $book->author->name }}</p>
                <p><strong>Published Year:</strong> {{ $book->published_year }}</p>
                <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
                
                <div class="mt-4">
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection