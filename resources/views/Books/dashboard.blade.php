@extends('includes.layout')
@section('content')
<div class="container m-5">
    <h1 class="text-success">Books disponibles</h1>
    <div class="row">
        @forelse ($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">Prix: {{ $book->prix }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('books.show', ['book' => $book->id]) }}" class="btn btn-sm btn-success">Show</a>
                                <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                            </div>
                            <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <p>No books available</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
