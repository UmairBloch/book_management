@extends('layouts.app')

@section('title', 'Books Update')

@section('content')

    <div class="card">
        <div class="card-body">
            <h1>Books Update</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label>Title:</label>
                <input type="text" name="title" class="form-control my-3" placeholder="Enter Title"
                    value="{{ old('title', $book->title) }}" aria-label="EnterTitle" aria-describedby="addon-wrapping">

                <label>Publication Year:</label>
                <input type="text" name="publication_year" class="form-control my-3" placeholder="Enter Publication Year"
                    value="{{ old('publication_year', $book->publication_year) }}" aria-label="PublicationYear"
                    aria-describedby="addon-wrapping">
                <label>Select Author:</label>

                <select class="form-select my-2" aria-label="Default select example" name="author_id">
                    <option selected disabled>Select Author</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}"
                            {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
