<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
<div class="form-container">
    <h1 class="title">Register Page</h1>

    <form class="form" method="POST" action="/register">
        @csrf

        <input type="text" name="name" placeholder="Name"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="password" name="password_confirmation" placeholder="Confirm Password"><br>

        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>
