@extends('layouts.app')

@section('title', 'Show Author')

@section('content')

    <div class="card">
        <div class="card-body">
            <h1 class="mb-3">Author View</h1>
            <div class="d-flex">
                <h6 class="card-title text-bolder">Name:</h6>
                <p class="card-text mx-2">{{ $author->name }}</p>
            </div>

            <h5 class="card-title text-bolder mt-3">Books by {{ $author->name }}</h5>
            @if ($author->books->count() > 0)
                <ul class="list-group">
                    @foreach ($author->books as $book)
                        <li class="list-group-item">{{ $book->title }} ({{ $book->publication_year }})</li>
                    @endforeach
                </ul>
            @else
                <p>No books found for this author.</p>
            @endif

            <a href="{{ route('authors.index') }}" class="btn btn-primary mt-3">Back</a>
        </div>
    </div>

@endsection
