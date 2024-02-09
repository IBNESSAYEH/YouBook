<?php


namespace App\Http\Controllers;

use App\Models\BookReservation;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Implement logic to fetch necessary data (e.g., users, books) and return the create view
        return view('reservations.create');
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
             'quantite' => 'required|integer|min:1',
             'book_id' => 'required|exists:books,id',
             'date_rec' => 'required|date|after:now',
         ]);

         // Get the authenticated user's ID
         $userId = Auth::id();

         // Create the reservation
         $reservation = [
             'quantite' => $request->quantite,
             'user_id' => $userId,
             'date_rec' => $request->date_rec
         ];
         $reservation = Reservation::create($reservation);

         // Retrieve the ID of the last inserted reservation
         $reservationId = $reservation->id;

         // Create the book reservation
         $book_reservation = [
             'book_id' => $request->book_id,
             'reservation_id' => $reservationId,
         ];
         $bookReservation = BookReservation::create($book_reservation);

         return redirect()->route('notifications')
             ->with('success', 'Reservation created successfully.');
     }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.edit', compact('reservation'));
    }
    public function notifications()
    {
        $userId = Auth::id();

// Retrieve reservations associated with the authenticated user
$reservations = Reservation::with('books')->where('user_id', $userId)->get();



        return view('Books.notifications', compact('reservations'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        Reservation::destroy($id);
        session()->flash('status', 'emprunte avec succes');
        return redirect()->route('notifications');
    }
}
