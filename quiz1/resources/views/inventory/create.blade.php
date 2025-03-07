<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create a New Inventory Item</h1>
    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ str_replace(':8000', '', config('app.url')) . '/inventory/' }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="{{ old('quantity') }}" required>

        <label for="price">Price:</label>
        <input type="number" name="price" value="{{ old('price') }}" required>

        <button type="submit">Create Item</button>
    </form>
    <a href="{{ str_replace(':8000', '', config('app.url')) . '/inventory' }}">Back to Inventory</a>

</body>
</html>