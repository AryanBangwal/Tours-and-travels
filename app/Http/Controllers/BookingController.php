<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'place']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('place_id')) {
            $query->where('place_id', $request->place_id);
        }

        if ($request->filled('start_date')) {
            $query->where('start_date', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->where('end_date', '<=', $request->end_date);
        }

        $bookings = $query->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $users = \App\Models\User::all();
        $places = \App\Models\Place::all();
        return view('bookings.create', compact('users', 'places'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'place_id' => 'required|exists:places,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'no_of_guests' => 'required|integer|min:1',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        Booking::create($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking created.');
    }

    public function edit(Booking $booking)
    {
        $users = \App\Models\User::all();
        $places = \App\Models\Place::all();
        return view('bookings.edit', compact('booking', 'users', 'places'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'place_id' => 'required|exists:places,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'no_of_guests' => 'required|integer|min:1',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking updated.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted.');
    }
}
