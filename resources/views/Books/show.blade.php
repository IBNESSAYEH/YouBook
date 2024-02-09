@extends('includes.layout')
@section('content')
    <div class="container m-5 d-flex justify-content-center ">
        <div class="card" style="width: 50vw;">
            <img src="" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="card-text">
                <p>Prix : {{ $book->prix }}</p>
                </p>

                <form  action="{{ route('reservation.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden"  name="book_id" value= "{{$book->id  }}" >
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number"  class="form-control" id="quantity" name="quantite" value="1" min="1">
                    </div>
                    <div class="mb-3">

                        <label for="date_recuperation" class="form-label">date recuperation:</label>
                        <input type="datetime-local"  class="form-control" id="date_recuperation" name="date_rec" required>
                    </div>
                    <button class="btn btn-success" name="submit" type="submit">Reserver</button>
                </form>
                <p class="mt-2">
                    <a class="btn btn-primary me-2" href="{{ route('books.edit', ['book' => $book->id]) }}">Edit book</a>

                </p>

            </div>
        </div>
    </div>
@endsection
