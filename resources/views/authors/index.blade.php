@extends('layouts.app')

@section('title', 'Authors')

@section('content')


    <div class="card p-3">
        <h1 class="pt-4">Authors</h1>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="container table-responsive py-5">
            <div class="d-flex justify-content-end py-3">
                <button type="button" class="btn btn-success"><a class="text-decoration-none text-white"
                        href="{{ route('authors.create') }}">Create <i class="fa fa-plus"
                            aria-hidden="true"></i></a></button>
            </div>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($authors as $author)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>

                            <td>{{ $author->name }}</td>
                            <td>
                                <a class="btn btn-success" data-bs-placement="top" title="Show"
                                    href="{{ route('authors.show', $author->id) }}"><i class="fa fa-eye"
                                        aria-hidden="true"></i></a>
                                <a class="btn btn-info" data-bs-placement="top" title="Edit"
                                    href="{{ route('authors.edit', $author->id) }}"><i class="fa fa-pencil-square-o"
                                        aria-hidden="true"></i></a>
                                <form id="delete-form-{{ $author->id }}"
                                    action="{{ route('authors.destroy', $author->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deleteAuthor({{ $author->id }})"
                                        data-bs-placement="top" title="Delete" class="btn btn-danger"><i
                                            class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No author found.</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    <script>
        function deleteAuthor(authorId) {
            if (confirm("Are you sure you want to delete this author?")) {
                document.getElementById('delete-form-' + authorId).submit();
            }
        }
    </script>

@endsection
