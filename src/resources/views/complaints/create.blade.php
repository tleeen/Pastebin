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
        <div class="card">
            <div class="card-header">
                <h5 class="card-title font-weight-bold">Жалоба на пост</h5>
            </div>
            <div class="card-body">
                <p class="card-text">
                    {{$paste->title}}
                    <span id="post-title"></span>
                </p>
                <form id="complaint-form" action="{{route('complaints.store', $paste->hash_id)}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="complaint-text" class="form-label">Текст жалобы:</label>
                        <textarea name="body" class="form-control" id="complaint-text" rows="5" style="font-size: 16px;"></textarea>
                        <input type="hidden" name="id" value="{{ $paste->hash_id }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
