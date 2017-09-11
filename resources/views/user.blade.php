<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
</head>
<body>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Laravel</title>

<ol>
    <li>firstname: {{ $user['firstname']}}</li>
    <li>surname: {{ $user['surname']}}</li>
    <li>email: {{ $user['email']}}</li>
</ol>


</body>


