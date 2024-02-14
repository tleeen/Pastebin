@extends('layouts.app')

@section('nav')
    @guest
        <a class="nav-link active" href="#">All Pastes</a>
        <a class="nav-link" href="{{ route('posts.create') }}">Create Paste</a>
    @else
        <a class="nav-link active" href="#">All Pastes</a>
        <a class="nav-link" href="{{ route("posts.user") }}">My Pastes</a>
        <a class="nav-link" href="{{ route('posts.create') }}">Create Paste</a>
    @endguest
@endsection

@section('content')
    <div class="row w-70 p-2">
        <div class="col-md-6 mb-2">
            <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action border mb-2 dark-border">
                <h6 class="mb-0">Заголовок новости 5</h6>
                <p class="mb-0 small">Автор: John Doe, Дата публикации: 12.02.2024</p>
            </a>
        </div>
        <div class="col-md-6 mb-2">
            <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action border mb-2 dark-border">
                <h6 class="mb-0">Заголовок новости 5</h6>
                <p class="mb-0 small">Автор: John Doe, Дата публикации: 12.02.2024</p>
            </a>
        </div>
        <div class="col-md-6 mb-2">
            <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action border mb-2 dark-border">
                <h6 class="mb-0">Заголовок новости 5</h6>
                <p class="mb-0 small">Автор: John Doe, Дата публикации: 12.02.2024</p>
            </a>
        </div>
        <div class="col-md-6 mb-2">
            <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action border mb-2 dark-border">
                <h6 class="mb-0">Заголовок новости 5</h6>
                <p class="mb-0 small">Автор: John Doe, Дата публикации: 12.02.2024</p>
            </a>
        </div>
        <div class="col-md-6 mb-2">
            <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action border mb-2 dark-border">
                <h6 class="mb-0">Заголовок новости 5</h6>
                <p class="mb-0 small">Автор: John Doe, Дата публикации: 12.02.2024</p>
            </a>
        </div>
        <div class="col-md-6 mb-2">
            <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action border mb-2 dark-border">
                <h6 class="mb-0">Заголовок новости 5</h6>
                <p class="mb-0 small">Автор: John Doe, Дата публикации: 12.02.2024</p>
            </a>
        </div>
        <div class="col-md-6 mb-2">
            <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action border mb-2 dark-border">
                <h6 class="mb-0">Заголовок новости 5</h6>
                <p class="mb-0 small">Автор: John Doe, Дата публикации: 12.02.2024</p>
            </a>
        </div>
        <div class="col-md-6 mb-2">
            <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action border mb-2 dark-border">
                <h6 class="mb-0">Заголовок новости 5</h6>
                <p class="mb-0 small">Автор: John Doe, Дата публикации: 12.02.2024</p>
            </a>
        </div>
        <div class="col-md-6 mb-2">
            <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action border mb-2 dark-border">
                <h6 class="mb-0">Заголовок новости 5</h6>
                <p class="mb-0 small">Автор: John Doe, Дата публикации: 12.02.2024</p>
            </a>
        </div>
        <div class="col-md-6 mb-2">
            <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action border mb-2 dark-border">
                <h6 class="mb-0">Заголовок новости 5</h6>
                <p class="mb-0 small">Автор: John Doe, Дата публикации: 12.02.2024</p>
            </a>
        </div>
        @if(\Illuminate\Support\Facades\Auth::user())
            <div class="col-md-6 mb-2 mx-auto">
                <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action border mb-2">
                    <h6 class="mb-0">Заголовок новости 5</h6>
                    <p class="mb-0 small">Автор: John Doe, Дата публикации: 12.02.2024</p>
                </a>
            </div>
        @else
            <div class="col-md-6 mb-2">
                <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action border mb-2 dark-border">
                    <h6 class="mb-0">Заголовок новости 5</h6>
                    <p class="mb-0 small">Автор: John Doe, Дата публикации: 12.02.2024</p>
                </a>
            </div>
        @endif
    </div>
@endsection
