<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBook;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books_disponible = Book::whereNull('date_rec')->get();
        $books_emprunter = Book::whereNotNull('date_res')->get();
        return view('Books.home',['books_emprunter' => $books_emprunter, 'books_disponible' => $books_disponible]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Books.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBook $request)
    {

        $book = Book::create($request->only(['title','prix',`updated_at`, `created_at` ]));
        session()->flash('status', 'book creer avec succes');
        return redirect()->route("books.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view("Books.show" , ["book" => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view("Books.edit", ["book" => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBook $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->title = $request->input("title");
        $book->prix = $request->input("prix");
        $book->save();
        session()->flash('status', 'book modifier avec succes');
        return redirect()->route("books.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        // $book = Book::findOrFail($id);
        // $book->delete();
        Book::destroy($id);
        session()->flash('status', 'book supprimer avec succes');
        return redirect()->back();
    }

    // ResourceController.php

    public function reserver( $id)
    {
        // Validate the request data as needed


        // Find the reservation by its ID
        $reservation = Book::findOrFail($id);

        // Update the reservation with the validated data
        $reservation->update([
            'date_res' => now(),
            'date_rec' => null,  // Par exemple, ajoutez 2 jours à la date actuelle
        ]);
        session()->flash('status', 'book reserver avec succes');
        // Redirect or respond as needed
        return redirect()->back();
    }
    public function recuperer( $id)
    {
        // Validate the request data as needed


        // Find the reservation by its ID
        $reservation = Book::findOrFail($id);

        // Update the reservation with the validated data
        $reservation->update([
            'date_res' => null,
            'date_rec' => now(),  // Par exemple, ajoutez 2 jours à la date actuelle
        ]);
        session()->flash('status', 'book recuperer avec succes');
        // Redirect or respond as needed
        return redirect()->back();
    }

}
