<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $payments = Payment::with('booking')->paginate(10);
        // dd($payments);
        return view('payments.index', compact('payments'));
    }
    
    public function create()
    {
        $bookings = Booking::all();
        return view('payments.create', compact('bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_at' => 'required|date',
            'third_party_ref_id' => 'required|string',
            'status' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment created.');
    }

    public function edit(Payment $payment)
    {
        $bookings = Booking::all();
        return view('payments.edit', compact('payment', 'bookings'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_at' => 'required|date',
            'third_party_ref_id' => 'required|string',
            'status' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment updated.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted.');
    }
}
