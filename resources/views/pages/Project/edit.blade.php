@extends('pages.project.layout')

@section('title', "Редактировать {$project['title']}")

@section('content')
    <h3>Редактирование - {{ $project['title'] }}</h3>
    <hr>
    <a href="{{ route('projects.index') }}">Назад к списку</a> |
    <a href="{{ route('projects.show', $project['id']) }}">Назад к проекту</a>
    <hr>

    <form action="">
        @csrf
        <label for="title">Название проекта:</label>
        <input name="title" type="text" value="{{ $project['title'] }}" />

        <label for="description">Описание проекта:</label>
        <input name="description" type="text" value="{{ $project['description'] }}" />

        <button type="submit">Обновить данные проекта</button>
    </form>
@endsection
