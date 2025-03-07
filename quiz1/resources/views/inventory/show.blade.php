<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inventory Item: {{ $inventoryItem->name }}</h1>
    <p>Quantity: {{ $inventoryItem->quantity }}</p>
    <p>Price: ${{ $inventoryItem->price }}</p>

    <a href="{{ route('inventory.index') }}">Back to Inventory</a>

</body>
</html>