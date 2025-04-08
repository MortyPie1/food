<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
<h1>Welcome, {{ Auth::user()->name }}!</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('foods.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Food Name" required>
    <input type="text" name="plu_code" placeholder="PLU Code" required>
    <button type="submit">Add Food</button>
</form>

<h2>All Food Entries</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>PLU Code</th>
        <th>Added By</th>
        <th>Date</th>
    </tr>
    @foreach($foods as $food)
        <tr>
            <td>{{ $food->name }}</td>
            <td>{{ $food->plu_code }}</td>
            <td>{{ $food->user->name }}</td>
            <td>{{ $food->created_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
