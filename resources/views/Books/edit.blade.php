@extends('includes/layout')
@section('content')


<div class="container mt-5">
    <form action="{{ route("books.update",["book" => $book->id]) }}" method="POST">
        @csrf
        @method("PUT")
     @include("includes.form")
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>



@endsection
