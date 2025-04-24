<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
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

<h2>Create User</h2>

<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="password" required>
        @error('password') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div>
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <button type="submit" class="btn">Save</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
</form>

</body>
</html>
