@extends('pages.project.layout')

@section('title', "Редактировать {$project->project_name}")

@section('content')
    <h3>Редактирование - {{ $project->project_name }}</h3>
    <hr>
    <a href="{{ route('projects.index') }}">Назад к списку</a> |
    <a href="{{ route('projects.show', $project->id) }}">Назад к проекту</a>
    <hr>

    <form action="">
        @csrf
        <label for="title">Название проекта:</label>
        <input name="title" type="text" value="{{ $project->project_name }}" /><br />

        <label>
            <input type="checkbox" name="status_active" value="1" {{ $project->status_active ? 'checked' : '' }}>
            Проект активен
        </label><br />

        <label for="deadline_date">Дедлайн выполнения:</label>
        <input type="date" name="deadline_date" id="deadline_date"
            value="{{ old('deadline_date', $project->deadline_date?->format('Y-m-d')) }}"><br />

        <button type="submit">Обновить данные проекта</button>
    </form>
@endsection
