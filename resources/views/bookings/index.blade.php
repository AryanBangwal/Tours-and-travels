<!DOCTYPE html>
<html>
<head>
    <title>Bookings</title>
</head>
<body style="font-family: Arial; padding: 20px; background: #f0f0f0;">

    <h2 style="text-align: center;">Bookings</h2>

    <form method="GET" action="{{ route('bookings.index') }}" style="margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap;">
        <select name="status" style="padding: 8px;">
            <option value="">All Status</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>

        <input type="text" name="user_id" placeholder="User ID" value="{{ request('user_id') }}" style="padding: 8px;">
        <input type="text" name="place_id" placeholder="Place ID" value="{{ request('place_id') }}" style="padding: 8px;">

        <input type="date" name="start_date" value="{{ request('start_date') }}" style="padding: 8px;">
        <input type="date" name="end_date" value="{{ request('end_date') }}" style="padding: 8px;">

        <button type="submit" style="padding: 8px 16px; background: #3490dc; color: #fff; border: none;">Filter</button>
    </form>

    <table style="width: 100%; border-collapse: collapse; background: #fff;">
        <thead>
            <tr style="background: #eee;">
                <th style="padding: 10px; border: 1px solid #ccc;">ID</th>
                <th style="padding: 10px; border: 1px solid #ccc;">User</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Place</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Start Date</th>
                <th style="padding: 10px; border: 1px solid #ccc;">End Date</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Guests</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Status</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $booking->id }}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $booking->user->name ?? 'N/A' }}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $booking->place->name ?? 'N/A' }}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $booking->start_date }}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $booking->end_date }}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $booking->no_of_guests }}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">{{ ucfirst($booking->status) }}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">
                        <a href="{{ route('bookings.edit', $booking->id) }}" style="margin-right: 10px; color: green;">✏️</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background: none; color: red;" onclick="return confirm('Are you sure?')">🗑️</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $bookings->withQueryString()->links() }}
    </div>

</body>
</html>
