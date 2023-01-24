@extends('layouts.app')

@section('title')Главная страница @endsection

@section('content')
<h3>Список пользователей</h3>

@foreach($users as $key => $user)
    <p>{{$user->name}}</p>
    <a href="{{route('user.edit', $user)}}">Редактировать</a>
    <form action="{{route('user.destroy', $user)}}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">Удалить</button>
    </form>
    <img src="{{asset('app/users/'.$user->avatar)}}" alt="">
    <h4>Статьи</h4>
    @forelse($user->articles as $artcle)
        <p>{{ $artcle->title }}</p>
        @empty
        <p>Статьей нету</p>
    @endforelse
    <p>Роли</p>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('user.add.role', $user)}}" method="post">
        @csrf
        <select name="role_id" id="">
            <option value="">Выберите роль</option>
            @foreach($roles as $role)
                <option value="{{$role->id}}">
                {{$role->name}}
                </option>
            @endforeach
        </select>
        <button type="submit">Добавить</button>
    </form>
@endforeach

<hr>
<h3>Создание пользователя</h3>

<form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="name">Имя</label>
    <input type="text" name="name" id="name" placeholder="Имя">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" placeholder="email">
    <input type="file" name="avatar">
    @include('layouts.button', ['name' => 'Создать'])
</form>
@endsection
