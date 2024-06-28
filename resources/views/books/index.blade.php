@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <div class="card p-3">
        <h1>Books</h1>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <p>{{ $message }}</p>
            </div>
        @endif
        
        <div class="container table-responsive py-5">
            <div class="d-flex justify-content-end py-3">
                <button type="button" class="btn btn-success"><a class="text-decoration-none text-white"
                        href="{{ route('books.create') }}">Create <i class="fa fa-plus" aria-hidden="true"></i></a></button>
            </div>

            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publication Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $book->title }}</td>
                            <td><a href="{{ route('authors.show', $book->author->id) }}">{{ $book->author->name }}</a></td>
                            <td>{{ $book->publication_year }}</td>
                            <td>
                                <a class="btn btn-success" data-bs-placement="top" title="Show"
                                    href="{{ route('books.show', $book->id) }}"><i class="fa fa-eye"
                                        aria-hidden="true"></i></a>
                                <a class="btn btn-info" data-bs-placement="top" title="Edit"
                                    href="{{ route('books.edit', $book->id) }}"><i class="fa fa-pencil-square-o"
                                        aria-hidden="true"></i></a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                        class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No books found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
