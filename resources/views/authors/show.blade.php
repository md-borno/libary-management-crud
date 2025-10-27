@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Author Details</h4>
            </div>
            <div class="card-body">
                <h5>{{ $author->name }}</h5>
                <p><strong>Email:</strong> {{ $author->email }}</p>
                <p><strong>Birth Date:</strong> {{ $author->birth_date->format('M d, Y') }}</p>
                <p><strong>Total Books:</strong> {{ $author->books->count() }}</p>
                
                <div class="mt-4">
                    <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('authors.destroy', $author) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Books by {{ $author->name }}</h5>
            </div>
            <div class="card-body">
                @if($author->books->count() > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Published Year</th>
                            <th>ISBN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($author->books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->published_year }}</td>
                            <td>{{ $book->isbn }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>No books found for this author.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection