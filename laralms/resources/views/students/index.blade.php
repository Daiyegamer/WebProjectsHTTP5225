@extends('layout')
@section('content')
<h1>All Students</h1>
<ul>
@foreach ( $students as $student)
    {{ $student -> fname }} {{ $student -> lname }}<br>
    
    @endforeach
</ul>
@endsection
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    All Students<br>
    @foreach ( $students as $student)
    {{ $student -> fname }} <br>
    
    @endforeach
</body>
</html> -->