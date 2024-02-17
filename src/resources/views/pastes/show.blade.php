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
                <h5 class="card-title" style="font-size: 18px;">{{$paste->title}}</h5>
                <div class="card-subtitle text-muted" style="font-size: 14px;">
                    <span class="badge bg-primary">{{$paste->type->title}}</span>
                    <span class="mx-2">•</span>
                    <span class="text-muted">{{$paste->created_at->format('d-m-Y H:i')}}</span>
                </div>
            </div>
            @if($paste->type->title !== 'text')
            <div class="card-body" style="justify-content: center; display: flex">
                <pre style="width: 70%;">
                    <code class="language-{{$paste->type->title}}" style="font-size: 14px; text-align: left;">
{{$paste->body}}
                    </code>
                </pre>
            </div>
            @else
                <div class="card-body">
                    <div class="card-text">
                        {{$paste->body}}
                    </div>
                </div>
            @endif
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <small class="text-muted" style="font-size: 14px;">
                        <span class="badge bg-warning">{{$paste->access_modifier->title}}</span>
                        <span class="mx-2">•</span>
                        <span class="badge bg-info">{{$paste->expiration_time->title}}</span>
                    </small>
                    <small class="text-muted" style="font-size: 14px;">Автор: <b style="font-size: 14px;">{{(!$paste->author) ? 'undefined' : $paste->author->email}}</b></small>
                </div>
                <a href="{{ route('complaints.create', $paste->hash_id) }}" class="btn btn-sm btn-danger mt-2" style="font-size: 14px;">Пожаловаться</a>
            </div>
        </div>
    </div>
@endsection

