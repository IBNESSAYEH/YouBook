<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookReservation;
use App\Models\Book;
use App\Models\Reservation;

class BookReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookReservations = BookReservation::all();
        return view('book_reservations.index', compact('bookReservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        $reservations = Reservation::all();
        return view('book_reservations.create', compact('books', 'reservations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'reservation_id' => 'required|exists:reservations,id',
        ]);

        BookReservation::create($request->all());

        return redirect()->route('book_reservations.index')
            ->with('success', 'Book reservation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookReservation = BookReservation::findOrFail($id);
        return view('book_reservations.show', compact('bookReservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookReservation = BookReservation::findOrFail($id);
        $books = Book::all();
        $reservations = Reservation::all();
        return view('book_reservations.edit', compact('bookReservation', 'books', 'reservations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'reservation_id' => 'required|exists:reservations,id',
        ]);

        $bookReservation = BookReservation::findOrFail($id);
        $bookReservation->update($request->all());

        return redirect()->route('book_reservations.index')
            ->with('success', 'Book reservation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BookReservation::findOrFail($id)->delete();
        return redirect()->route('book_reservations.index')
            ->with('success', 'Book reservation deleted successfully.');
    }
}

