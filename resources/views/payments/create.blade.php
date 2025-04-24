<!DOCTYPE html>
<html>
<head>
    <title>Create Payment</title>
</head>
<body>

<h2>Create Payment</h2>

<form action="{{ route('payments.store') }}" method="POST">
    @csrf

    <label>Booking</label>
    <select name="booking_id" required>
        @foreach($bookings as $booking)
            <option value="{{ $booking->id }}">{{ $booking->id }}</option>
        @endforeach
    </select><br><br>

    <label>Amount</label>
    <input type="number" name="amount" step="0.01" required><br><br>

    <label>Status</label>
    <input type="text" name="status" value="pending" required><br><br>

    <label>Payment At</label>
    <input type="datetime-local" name="payment_at" required><br><br>

    <label>Third Party Ref ID</label>
    <input type="text" name="third_party_ref_id" required><br><br>

    <button type="submit">Create</button>
    <a href="{{ route('payments.index') }}">Cancel</a>
</form>

</body>
</html>
