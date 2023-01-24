@extends('layouts.app')

@section('title')Главная страница @endsection

@section('content')
<h3>Редактирование пользователя</h3>

<form action="{{route('user.update', $user)}}" method="post">
    @method('PUT')
    @csrf
    <label for="name">Имя</label>
    <input type="text" name="name" value="{{$user->name}}" id="name" placeholder="Имя">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{$user->email}}" placeholder="email">
    <button type="submit">Обновить</button>
</form>
@endsection
