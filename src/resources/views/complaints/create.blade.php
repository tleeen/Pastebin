@extends('layouts.app')

@section('nav')
    @guest
        <a class="nav-link" href="{{ route('posts.all') }}">All Pastes</a>
        <a class="nav-link" href="{{ route('posts.create') }}">Create Paste</a>
    @else
        <a class="nav-link" href="{{ route('posts.all') }}">All Pastes</a>
        <a class="nav-link" href="{{ route('posts.user') }}">My Pastes</a>
        <a class="nav-link" href="{{ route('posts.create') }}">Create Paste</a>
    @endguest
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title font-weight-bold">Жалоба на пост</h5>
            </div>
            <div class="card-body">
                <p class="card-text">
                    **Название поста:**
                    <span id="post-title"></span>
                </p>
                <form id="complaint-form">
                    <div class="mb-3">
                        <label for="complaint-text" class="form-label">Текст жалобы:</label>
                        <textarea class="form-control" id="complaint-text" rows="5" style="font-size: 16px;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
