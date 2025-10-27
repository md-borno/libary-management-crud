@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h4>Edit Borrow Record</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('borrow-records.update', $borrowRecord) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="book_id" class="form-label">Book</label>
                        <select class="form-control @error('book_id') is-invalid @enderror" id="book_id" name="book_id" required>
                            <option value="">Select Book</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" {{ old('book_id', $borrowRecord->book_id) == $book->id ? 'selected' : '' }}>
                                    {{ $book->title }} by {{ $book->author->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="borrower_name" class="form-label">Borrower Name</label>
                        <input type="text" class="form-control @error('borrower_name') is-invalid @enderror" id="borrower_name" name="borrower_name" value="{{ old('borrower_name', $borrowRecord->borrower_name) }}" required>
                        @error('borrower_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="borrowed_at" class="form-label">Borrowed At</label>
                        <input type="datetime-local" class="form-control @error('borrowed_at') is-invalid @enderror" id="borrowed_at" name="borrowed_at" value="{{ old('borrowed_at', $borrowRecord->borrowed_at->format('Y-m-d\TH:i')) }}" required>
                        @error('borrowed_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="returned_at" class="form-label">Returned At (Leave empty if not returned)</label>
                        <input type="datetime-local" class="form-control @error('returned_at') is-invalid @enderror" id="returned_at" name="returned_at" value="{{ old('returned_at', $borrowRecord->returned_at ? $borrowRecord->returned_at->format('Y-m-d\TH:i') : '') }}">
                        @error('returned_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="{{ route('borrow-records.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection