<!-- resources/views/places/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit Place</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 40px;">

    <h2 style="text-align: center;">Edit Place</h2>

    <form action="{{ route('places.update', $place->id) }}" method="POST" style="max-width: 600px; margin: auto; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px;">Name:</label>
            <input type="text" name="name" value="{{ $place->name }}" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px;">Description:</label>
            <textarea name="description" rows="4" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required>{{ $place->description }}</textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px;">File ID:</label>
            <input type="number" name="file_id" value="{{ $place->file_id }}" style="width: 100%; padding: 10px; border: 1px solid #ccc;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px;">Price:</label>
            <input type="text" name="price" value="{{ $place->price }}" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px;">Rating:</label>
            <input type="text" name="rating" value="{{ $place->rating }}" style="width: 100%; padding: 10px; border: 1px solid #ccc;">
        </div>

        <div style="text-align: center;">
            <button type="submit" style="background-color: #f59e0b; color: white; padding: 12px 24px; border: none; border-radius: 4px;">Update Place</button>
        </div>
    </form>

</body>
</html>
