@extends('layouts.app')
@section('content')
    <h1>Hello , {{ $name }}</h1>
    <form method="POST" action="/about">
        @csrf
        <input type="text" name="name" id="name">
        <br>
        <br>
        <select name="department" id="department">
            @foreach ($departments as $key => $department)
                <option value="{{ $key }}">{{ $department }}</option>
            @endforeach
        </select>
        {{-- <select name="department" id="department">
            <option value="1">Tichnical</option>
            <option value="2">Financial</option>
            <option value="3">Sales</option>
        </select> --}}
        <br>
        <br>
        <input type="submit" value="Send">

    </form>
@endsection
