@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Dashboard</h1>
        <p class="lead">Welcome to Library Management System</p>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Total Authors</h5>
                <h2 class="card-text">{{ $totalAuthors }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Total Books</h5>
                <h2 class="card-text">{{ $totalBooks }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">Currently Borrowed</h5>
                <h2 class="card-text">{{ $totalBorrowed }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Quick Actions</h5>
                <a href="{{ route('authors.create') }}" class="btn btn-primary">Add Author</a>
                <a href="{{ route('books.create') }}" class="btn btn-success">Add Book</a>
                <a href="{{ route('borrow-records.create') }}" class="btn btn-info">Create Borrow Record</a>
                <a href="{{ route('reports.index') }}" class="btn btn-warning">View Reports</a>
            </div>
        </div>
    </div>
</div>
@endsection