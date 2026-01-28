@extends('pages.project.layout')

@section('title', $project['title'])

@section('content')
    <h3>{{ $project['title'] }}</h3>
    <hr>
    <a href="{{ route('projects.index') }}">Назад к списку</a> |
    <a href="{{ route('projects.edit', $project['id']) }}">Редактировать</a>
    <hr>

    <p><strong>Описание:</strong></p>
    <p>{{ $project['description'] }}</p>
@endsection
