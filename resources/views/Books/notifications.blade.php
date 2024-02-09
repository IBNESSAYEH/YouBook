@extends('includes.layout')
@section('content')
    <div class="container">
        <h1 class="mt-5 mb-4">Reservations</h1>

        <div class="row">
            @foreach ($reservations as $reservation)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reservation ID: {{ $reservation->id }}</h5>
                        <p class="card-text">Quantity: {{ $reservation->quantite }}</p>
                        <h6 class="card-subtitle mb-3">Books:</h6>
                        <ul class="list-unstyled">
                            @foreach ($reservation->books as $book)
                            <li>{{ $book->title }}</li>
                            @endforeach
                        </ul>

                        <form action="{{ route('reservation.destroy', ['reservation'=> $reservation->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-sm btn-success">emprunter</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
