@extends('layout')
@section('content')
<h1>Add Student</h1>
  <form action="{{ route('students.store') }}" method="POST">
    {{  csrf_field() }}
    <input type="text" name="fname" placeholder="firstname">
    <input type="text" name="lname" placeholder="lastname">
    <input type="text" name="email" placeholder="Adil@example.com">

    <select name="course" id="course">
            @foreach ($courses as $course )
                <option value="{{ $course -> id}}">{{ $course -> name }}</option>
            @endforeach
    </select>

    <input type="submit" value="Create">


  </form>
@endsection