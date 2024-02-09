@extends('includes/layout')
@section('content')

<div class="container mt-5">
    <form action="{{ route("books.store") }}" method="POST">
        @csrf
        @include("includes.form")
 <input type="hidden" name="user_id" value=1>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>


@endsection
