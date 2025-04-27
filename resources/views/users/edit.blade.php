<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
        form { max-width: 400px; margin: 20px auto; }
        div { margin-bottom: 12px; }
        label { display: block; font-weight: bold; }
        input { width: 100%; padding: 8px; }
        .btn { padding: 8px 12px; background: #007bff; color: white; border: none; border-radius: 4px; }
        .btn-secondary { background: gray; }
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>

<h2>Edit User</h2>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        @error('name') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        @error('email') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div>
        <label>New Password (leave blank to keep current)</label>
        <input type="password" name="password">
        @error('password') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div>
        <label>Confirm New Password</label>
        <input type="password" name="password_confirmation">
    </div>

    <button type="submit" class="btn">Update</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
</form>

</body>
</html>
