@extends('pages.Project.layout')

@section('title', "Редактировать {$project->project_name}")

@section('content')
    <h3>Редактирование - {{ $project->project_name }}</h3>
    <hr>
    <a href="{{ route('projects.index') }}">Назад к списку</a> |
    <a href="{{ route('projects.show', $project->id) }}">Назад к проекту</a>
    <hr>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 10px;">
            <label for="project_name">Название проекта:*</label><br>
            <input type="text" name="project_name" id="project_name"
                value="{{ old('project_name', $project->project_name) }}" required>
            @error('project_name')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 10px;">
            <label>
                <input type="checkbox" name="status_active" value="1"
                    {{ old('status_active', $project->status_active) ? 'checked' : '' }}>
                Активный проект
            </label>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="assignee_id">ID ответственного:</label><br>
            <input type="number" name="assignee_id" id="assignee_id"
                value="{{ old('assignee_id', $project->assignee_id) }}">
            @error('assignee_id')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="deadline_date">Дедлайн:</label><br>
            <input type="date" name="deadline_date" id="deadline_date"
                value="{{ old('deadline_date', $project->deadline_date ? $project->deadline_date->format('Y-m-d') : '') }}">
            @error('deadline_date')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Обновить проект</button>

        <button type="button" onclick="if(confirm('Удалить проект?')) { document.getElementById('delete-form').submit(); }"
            style="background: red; color: white; margin-left: 10px;">
            Удалить проект
        </button>
    </form>

    <form id="delete-form" action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection
