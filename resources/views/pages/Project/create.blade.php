@extends('pages.project.layout')

@section('title', 'Создать проект')

@section('content')
    <h3>Форма создания проекта:</h3>
    <hr>
    <a href="{{ route('projects.index') }}">Назад к списку</a>
    <hr>

    <form action="">
        @csrf
        <label for="title">Название проекта:</label>
        <input name="title" type="text" />

        <label for="description">Описание проекта:</label>
        <input name="description" type="text" />

        <button type="submit">Создать проект</button>
    </form>
@endsection
