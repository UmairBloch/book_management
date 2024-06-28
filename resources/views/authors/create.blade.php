@extends('layouts.app')

@section('title', 'Author Create')

@section('content')

    <div class="card">
        <div class="card-body">
            <h1>Create Author</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('authors.store') }}" method="POST">
                @csrf
                <label>Name:</label>
                <input type="text" name="name" class="form-control my-3 " placeholder="Enter Author Name"
                    aria-label="Authorname" aria-describedby="addon-wrapping">

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
