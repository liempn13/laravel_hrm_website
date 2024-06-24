<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <div>
        <input class="textfield" type="{{ $texttype }}" placeholder="{{ $placeholder }}">
        <label for="textfield">{{ $placeholder }}</label>
        <button onclick="togglePassword(this)"></button>
    </div>
    <script type="text/javascript" src="{{ assets('js/textfield.js') }}"></script>
</body>

</html>
