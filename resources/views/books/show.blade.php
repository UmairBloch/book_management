@extends('layouts.app')

@section('title', 'Show Book')

@section('content')

    <div class="card">
        <div class="card-body">
            <h1>Book View</h1>
            <div class="d-flex my-3">
                <h6 class="card-title text-bolder">Book Title:</h6>
                <span class="card-text mx-3">{{ $book->title }}</span>
            </div>

            <div class="d-flex my-3">
                <h5 class="card-title text-bolder">Book Publication Year:</h5>
                <p class="card-text mx-3">{{ $book->publication_year }}</p>
            </div>

            <div class="d-flex my-3">
                <h5 class="card-title text-bolder">Book Author:</h5>
                <p class="card-text mx-3">{{ $book->author->name }}</p>
            </div>

            <a href="{{ route('books.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
