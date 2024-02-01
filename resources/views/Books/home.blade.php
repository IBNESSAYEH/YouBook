@extends('includes/layout')
@section('content')
{{-- books disponibles --}}
<div class="container m-5">

    <h1 class="text-success">books disponibles</h1>
    
    @if ($books_disponible)

    <table class="table">
        <thead>
          <tr>

            <th scope="col">title</th>
            <th scope="col">prix</th>
            <th scope="col">actions</th>
          </tr>
        </thead>
        <tbody>
    @endif
            @forelse ($books_disponible as $book)


            <tr>

                <td>{{$book->title}}</td>
                <td>{{$book->prix}}</td>
                <td class="d-flex ">
                    <a class="btn btn-success me-1" href="{{route('books.show', ["book" => $book->id])}}">show</a>
                    <a class="btn btn-primary me-1" href="{{route('books.edit', ["book" => $book->id])}}">edit</a>
                    <form action="{{ route("books.destroy", ["book" => $book->id]) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">delete</button>
                    </form>
                </td>
            </tr>


            @empty
            @endforelse
            @if ($books_disponible)
        </tbody>
    </table>
    @endif

        </div>{{-- books non disponible --}}
        <div class="container m-5">
<h1 class="text-danger">books emprunter</h1>
            @if ($books_emprunter)

            <table class="table">
                <thead>
                  <tr>

                    <th scope="col">title</th>
                    <th scope="col">prix</th>
                    <th scope="col">actions</th>
                  </tr>
                </thead>
                <tbody>
            @endif
                    @forelse ($books_emprunter as $book)


                    <tr>

                        <td>{{$book->title}}</td>
                        <td>{{$book->prix}}</td>
                        <td class="d-flex ">
                            <a class="btn btn-success me-1" href="{{route('books.show', ["book" => $book->id])}}">show</a>

                        </td>
                    </tr>


                    @empty
                    @endforelse
                    @if ($books_emprunter)
                </tbody>
            </table>
            @endif
                </div>


@endsection
