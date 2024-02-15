@extends('layouts.app')

@section('nav')
    @guest
        <a class="nav-link" href="{{ route('pastes.index') }}">All Pastes</a>
        <a class="nav-link active" href="#">Create Paste</a>
    @else
        <a class="nav-link" href="{{ route('pastes.index') }}">All Pastes</a>
        <a class="nav-link" href="{{ route('users.pastes') }}">My Pastes</a>
        <a class="nav-link active" href="#">Create Paste</a>
    @endguest
@endsection

@section('content')
        <div class="d-flex justify-content-around">
            <div class="col-md-5">
                <div class="d-flex flex-column h-100 justify-content-center">
                    <form class="border p-2 w-70">
                        <div class="form-group mb-4">
                            <label for="title">Заголовок</label>
                            <input type="text" class="form-control" id="title" placeholder="Введите заголовок">
                        </div>
                        <div class="form-group mb-4">
                            <label for="code">Текст:</label>
                            <textarea class="form-control" id="code" rows="10" style="font-family: monospace;"></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="time">Время:</label>
                                <select class="form-control" id="time">
                                    <option value="1" style="text-align: center;" selected>1 час</option>
                                    <option value="2" style="text-align: center;">2 часа</option>
                                    <option value="3" style="text-align: center;">3 часа</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="type">Тип:</label>
                                <select class="form-control" id="type">
                                    <option value="public" style="text-align: center;" selected>Публичный</option>
                                    <option value="private" style="text-align: center;">Приватный</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="restriction">Ограничение:</label>
                                <select class="form-control" id="restriction">
                                    <option value="age" style="text-align: center;" selected>Возрастное</option>
                                    <option value="geo" style="text-align: center;">Географическое</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="container mb-2">
                    <h5 class="mb-2">Все пасты</h5>
                    <div class="border p-2 overflow-auto dark-border" style="height: 35vh;">
                        <a href="{{ route('pastes.show') }}" class="list-group-item list-group-item-action border mb-1">
                            <h6 class="mb-0">Заголовок новости 1</h6>
                            <p class="mb-0 small">Автор: John Doe, Дата публикации: 12.02.2024</p>
                        </a>
                        ...
                    </div>
                </div>
                <div class="container">
                    <h5 class="mb-2">Мои пасты</h5>
                    <div class="border p-2 overflow-auto dark-border" style="height: 35vh;">
                        <a href="{{ route('pastes.show') }}" class="list-group-item list-group-item-action border mb-1">
                            <h6 class="mb-0">Заголовок новости 1</h6>
                            <p class="mb-0 small">Автор: Jane Doe, Дата публикации: 12.02.2024</p>
                        </a>
                        ...
                    </div>
                </div>
            </div>
@endsection

