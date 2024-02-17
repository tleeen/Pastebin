@extends('layouts.app')

@section('nav')
    @guest
        <a class="nav-link" href="{{ route('pastes.index') }}">Все Пасты</a>
        <a class="nav-link" href="{{ route('pastes.create') }}">Создать Пасту</a>
    @else
        <a class="nav-link" href="{{ route('pastes.index') }}">Все Пасты</a>
        <a class="nav-link" href="{{ route('users.pastes', auth()->user()->id) }}">Мои Пасты</a>
        <a class="nav-link" href="{{ route('pastes.create') }}">Создать Пасту</a>
    @endguest
@endsection

@section('content')
    <div class="container mt-5">
        @yield('content')
    </div>
@endsection
