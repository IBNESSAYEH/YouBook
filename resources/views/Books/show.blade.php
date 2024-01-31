@extends('includes/layout')
@section('content')

<div class="container m-5 d-flex justify-content-center ">
    <div class="card" style="width: 50vw;">
        <img src="data:image/jpeg;base64,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" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$book->title}}</h5>
          <p class="card-text">
            <p>Prix : {{$book->prix}}</p>
            <p>date Ajout : {{$book->created_at->diffForHumans()}}</p>
            <p>date reservation : {{\Carbon\Carbon::parse($book->date_res)->diffForHumans()}}</p>
            <p>date recuperation : {{\Carbon\Carbon::parse($book->date_rec)->diffForHumans()}}</p>
          </p>
          <a class="btn btn-primary" href="{{route('books.edit', ["book" => $book->id])}}">edit</a>
          <a class="btn btn-success" href="#" class="btn btn-primary">reserver</a>
          <a class="btn btn-danger" href="#" class="btn btn-primary">recuperer</a>
        </div>
      </div>
</div>

@endsection
