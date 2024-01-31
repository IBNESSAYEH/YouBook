@extends('includes/layout')
@section('content')

    <div class="container m-5">

        @if ($books)

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
                @forelse ($books as $book)


                <tr>

                    <td>{{$book->title}}</td>
                    <td>{{$book->prix}}</td>
                    <td>
                        <a class="btn btn-success" href="{{route('books.show', ["book" => $book->id])}}">show</a>
                        <a class="btn btn-primary" href="{{route('books.edit', ["book" => $book->id])}}">edit</a>
                    </td>
                </tr>


                @empty
                @endforelse
                @if ($books)
            </tbody>
        </table>
        @endif
            </div>


@endsection
