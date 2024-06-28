@extends('layouts.app')

@section('title', 'Books Create')

@section('content')

    <div class="card">
        <div class="card-body">
            <h1>Books Create</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title"
                        value="{{ old('title') }}" aria-describedby="titleHelp">
                </div>

                <div class="mb-3">
                    <label for="publication_year" class="form-label">Publication Year:</label>
                    <input type="text" name="publication_year" class="form-control" placeholder="Enter Publication Year"
                        value="{{ old('publication_year') }}" aria-describedby="publicationYearHelp">
                </div>

                <div class="mb-3">
                    <label for="author_id" class="form-label">Select Author:</label>
                    <select class="form-select my-2" aria-label="Default select example" name="author_id">
                        <option selected disabled>Select Author</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
