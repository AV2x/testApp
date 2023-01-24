@extends('layouts.app')

@section('title') Авторизация @endsection

@section('content')

    <form action="{{route('authenticate')}}" method="post">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <button type="submit">Авторизоваться</button>
        </div>
    </form>

@endsection
