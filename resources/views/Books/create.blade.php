@extends('includes/layout')
@section('content')

<div class="container mt-5">
    <form action="{{ route("books.store") }}" method="POST">
        @csrf
        @include("includes.form")

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>


@endsection
