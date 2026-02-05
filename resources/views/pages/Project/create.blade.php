@extends('pages.Project.layout')

@section('content')
    <h3>Создание нового проекта</h3>
    <hr>
    <a href="{{ route('projects.index') }}">Назад к списку</a>
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

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 10px;">
            <label for="project_name">Название проекта:*</label><br>
            <input type="text" name="project_name" id="project_name" value="{{ old('project_name') }}" required>
            @error('project_name')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 10px;">
            <label>
                <input type="checkbox" name="status_active" value="1" {{ old('status_active') ? 'checked' : '' }}>
                Активный проект
            </label>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="assignee_id">ID ответственного:</label><br>
            <input type="number" name="assignee_id" id="assignee_id" value="{{ old('assignee_id') }}">
            @error('assignee_id')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 10px;">
            <label for="deadline_date">Дедлайн:*</label><br>
            <input type="date" name="deadline_date" id="deadline_date" value="{{ old('deadline_date') }}" required>
            @error('deadline_date')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Создать проект</button>
    </form>
@endsection
