@extends('layouts.app')

@section('nav')
        <a class="nav-link" href="{{ route('pastes.index') }}">Все Пасты</a>
        <a class="nav-link active" href="#">Мои Пасты</a>
        <a class="nav-link" href="{{ route('pastes.create') }}">Создать Пасту</a>
@endsection

@section('content')
    <div class="row w-70 p-2">
        @foreach($pastes as $index => $paste)
            @if($index === $pastes->count()-1 and $pastes->count() % 2 === 1)
                <div class="col-md-6 mb-2 mx-auto">
                    <a href="{{ route('pastes.show', $paste->hash_id) }}" class="list-group-item list-group-item-action border mb-2">
                        <h6 class="mb-0">{{$paste->title}}</h6>
                        <p class="mb-0 small">Автор: {{$paste->author->email}},    Дата публикации: {{$paste->created_at->format('d-m-Y H:i')}}</p>
                    </a>
                </div>
            @else
                <div class="col-md-6 mb-2">
                    <a href="{{ route('pastes.show', $paste->hash_id) }}" class="list-group-item list-group-item-action border mb-2 dark-border">
                        <h6 class="mb-0">{{$paste->title}}</h6>
                        <p class="mb-0 small">Автор: {{$paste->author->email}},    Дата публикации: {{$paste->created_at->format('d-m-Y H:i')}}</p>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
    <div>{{$pastes->links()}}</div>
@endsection
