<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <title>NLOffice</title>
</head>

<body>
    <div class="login-card">
        <h2>Login</h2>
        <h3>Enter your credentials</h3>
        <form class="login-form">

            {{-- @extends('partial.textfield')

            @section('textfield')

            @stop --}}
            <input type="text" placeholder="Email or phone number">
            <input type="password" placeholder="Password">
            {{-- <button type="button" onclick="showPass(this)"></button> --}}
            <a href="/forgot_password">Forgot your password?</a>
            <button type="submit" onclick="window.location ='{{ url('/dashboard') }}'">Login</button>
        </form>
    </div>
</body>

</html>
