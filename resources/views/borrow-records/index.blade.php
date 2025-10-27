@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Borrow Records</h1>
    <a href="{{ route('borrow-records.create') }}" class="btn btn-primary">Create New Borrow Record</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book</th>
                    <th>Author</th>
                    <th>Borrower Name</th>
                    <th>Borrowed At</th>
                    <th>Returned At</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrowRecords as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->book->title }}</td>
                    <td>{{ $record->book->author->name }}</td>
                    <td>{{ $record->borrower_name }}</td>
                    <td>{{ $record->borrowed_at->format('M d, Y H:i') }}</td>
                    <td>{{ $record->returned_at ? $record->returned_at->format('M d, Y H:i') : 'Not Returned' }}</td>
                    <td>
                        @if($record->returned_at)
                            <span class="badge bg-success">Returned</span>
                        @else
                            <span class="badge bg-warning">Borrowed</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('borrow-records.edit', $record) }}" class="btn btn-sm btn-warning">Edit</a>
                        @if(!$record->returned_at)
                        <form action="{{ route('borrow-records.return', $record) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Mark Returned</button>
                        </form>
                        @endif
                        <form action="{{ route('borrow-records.destroy', $record) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection