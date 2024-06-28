@extends('layouts.app')

@section('title', 'Author Update')

@section('content')

    <div class="card">
        <div class="card-body">
            <h1>Author Update</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('authors.update', $author->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label>Name:</label>
                <input type="text" name="name" class="form-control my-3" placeholder="Username" aria-label="Username"
                    value="{{ old('name', $author->name) }}" aria-describedby="addon-wrapping">
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
