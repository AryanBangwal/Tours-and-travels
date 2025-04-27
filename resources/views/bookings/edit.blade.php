<!DOCTYPE html>
<html>
<head>
    <title>{{ isset($booking) ? 'Edit' : 'Create' }} Booking</title>
</head>
<body style="font-family: Arial; padding: 40px; background-color: #f5f5f5;">

    <h2 style="text-align: center;">{{ isset($booking) ? 'Edit' : 'Create' }} Booking</h2>
    @if ($errors->any())
        <div style="max-width: 600px; margin: 0 auto 20px; padding: 15px; background-color: #ffe0e0; border-left: 5px solid #f44336; border-radius: 4px;">
            <ul style="margin: 0; padding-left: 20px; color: #b71c1c;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ isset($booking) ? route('bookings.update', $booking->id) : route('bookings.store') }}" method="POST" style="max-width: 600px; margin: auto; background: #fff; padding: 30px;">
        @csrf
        @if(isset($booking))
            @method('PUT')
        @endif

        <div style="margin-bottom: 20px;">
            <label>User:</label>
            <select name="user_id" style="width: 100%; padding: 10px;">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ (isset($booking) && $booking->user_id == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label>Place:</label>
            <select name="place_id" style="width: 100%; padding: 10px;">
                @foreach($places as $place)
                    <option value="{{ $place->id }}" {{ (isset($booking) && $booking->place_id == $place->id) ? 'selected' : '' }}>{{ $place->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label>Start Date:</label>
            <input type="date" name="start_date" value="{{ $booking->start_date ?? '' }}" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label>End Date:</label>
            <input type="date" name="end_date" value="{{ $booking->end_date ?? '' }}" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label>No. of Guests:</label>
            <input type="number" name="no_of_guests" value="{{ $booking->no_of_guests ?? 1 }}" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label>Status:</label>
            <select name="status" style="width: 100%; padding: 10px;">
                @foreach(['pending', 'confirmed', 'cancelled'] as $status)
                    <option value="{{ $status }}" {{ (isset($booking) && $booking->status === $status) ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                @endforeach
            </select>
        </div>

        <div style="text-align: center;">
            <button type="submit" style="padding: 12px 24px; background-color: #38b2ac; color: #fff; border: none;">
                {{ isset($booking) ? 'Update' : 'Create' }} Booking
            </button>
        </div>
    </form>

</body>
</html>
