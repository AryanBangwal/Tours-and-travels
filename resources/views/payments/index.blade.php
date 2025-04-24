<!DOCTYPE html>
<html>
<head>
    <title>Payments</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f5f5f5; }
        a.btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; color: white; }
        .btn-primary { background: #007bff; }
        .btn-danger { background: red; }
        .btn-warning { background: orange; }
    </style>
</head>
<body>

<h2>Payments</h2>
<a href="{{ route('payments.create') }}" class="btn btn-primary">Add Payment</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Booking ID</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Paid At</th>
            <th>Ref ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->booking_id }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->status }}</td>
                <td>{{ $payment->payment_at }}</td>
                <td>{{ $payment->third_party_ref_id }}</td>
                <td>
                    <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7">No payments found.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $payments->links() }}

</body>
</html>
