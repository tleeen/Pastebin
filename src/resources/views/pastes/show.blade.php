@extends('layouts.app')

@section('nav')
    @guest
        <a class="nav-link" href="{{ route('pastes.index') }}">Все Пасты</a>
        <a class="nav-link" href="{{ route('pastes.create') }}">Создать Пасту</a>
    @else
        <a class="nav-link" href="{{ route('pastes.index') }}">Все Пасты</a>
        <a class="nav-link" href="{{ route('users.pastes') }}">Мои Пасты</a>
        <a class="nav-link" href="{{ route('pastes.create') }}">Создать Пасту</a>
    @endguest
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title" style="font-size: 18px;">Название поста</h5>
                <div class="card-subtitle text-muted" style="font-size: 14px;">
                    <span class="badge bg-primary">Тип поста</span>
                    <span class="mx-2">•</span>
                    <span class="text-muted">14.02.2024 12:00</span>
                </div>
            </div>
            @if(\Illuminate\Support\Facades\Auth::user())
            <div class="card-body" style="justify-content: center; display: flex">
                <pre style="width: 70%;">
                    <code class="language-java" style="font-size: 14px; text-align: left;">
 {{"//load data
    var data = new Instances()"}}

                    </code>
                </pre>
            </div>
            @else
                <div class="card-body">
                    <div class="card-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi ducimus ipsum libero maiores sint suscipit, temporibus. Ad at earum eos esse exercitationem facilis nulla possimus reiciendis temporibus. Alias, culpa, deserunt!
                    </div>
                </div>
            @endif
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <small class="text-muted" style="font-size: 14px;">
                        <span class="badge bg-warning">Модификатор доступа</span>
                        <span class="mx-2">•</span>
                        <span class="badge bg-info">Ограничение</span>
                    </small>
                    <small class="text-muted" style="font-size: 14px;">Автор: <b style="font-size: 14px;">Имя автора</b></small>
                </div>
                <a href="{{ route('complaints.create') }}" class="btn btn-sm btn-danger mt-2" style="font-size: 14px;">Пожаловаться</a>
            </div>
        </div>
    </div>
@endsection

