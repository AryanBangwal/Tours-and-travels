<!DOCTYPE html>
<html>
<head>
    <title>Edit Payment</title>
</head>
<body>

<h2>Edit Payment</h2>

<form action="{{ route('payments.update', $payment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Booking</label>
    <select name="booking_id" required>
        @foreach($bookings as $booking)
            <option value="{{ $booking->id }}" {{ $booking->id == $payment->booking_id ? 'selected' : '' }}>
                {{ $booking->id }}
            </option>
        @endforeach
    </select><br><br>

    <label>Amount</label>
    <input type="number" name="amount" step="0.01" value="{{ $payment->amount }}" required><br><br>

    <label>Status</label>
    <input type="text" name="status" value="{{ $payment->status }}" required><br><br>

    <label>Payment At</label>
    <input type="datetime-local" name="payment_at" value="{{ \Carbon\Carbon::parse($payment->payment_at)->format('Y-m-d\TH:i') }}" required><br><br>

    <label>Third Party Ref ID</label>
    <input type="text" name="third_party_ref_id" value="{{ $payment->third_party_ref_id }}" required><br><br>

    <button type="submit">Update</button>
    <a href="{{ route('payments.index') }}">Cancel</a>
</form>

</body>
</html>
