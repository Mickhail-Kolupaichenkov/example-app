@extends('pages.project.layout')

@section('title', $project->project_name)

@section('content')
    <h3>{{ $project->project_name }}</h3>
    <hr>
    <a href="{{ route('projects.index') }}">Назад к списку</a> |
    <a href="{{ route('projects.edit', $project->id) }}">Редактировать</a>
    <hr>

    <p><strong>ID проекта:</strong> {{ $project->id }}</p>
    <p><strong>Название:</strong> {{ $project->project_name }}</p>
    <p><strong>Статус:</strong>
        @if ($project->status_active)
            Активен
        @else
            Неактивен
        @endif
    </p>
    <p><strong>ID создателя:</strong> {{ $project->user_id }}</p>
    <p><strong>ID ответственного:</strong>
        @if ($project->assignee_id)
            {{ $project->assignee_id }}
        @else
            Не назначен
        @endif
    </p>
    <p><strong>Дедлайн:</strong>
        @if ($project->deadline_date)
            {{ $project->deadline_date->format('d.m.Y') }}
        @else
            Не установлен
        @endif
    </p>
@endsection
