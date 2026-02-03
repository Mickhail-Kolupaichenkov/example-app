@extends('pages.project.layout')

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

        <button type="submit">Обновить</button>

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
