@extends('pages.project.layout')

@section('content')
    <h3>Список проектов:</h3>
    <hr>
    <a href="{{ route('projects.create') }}">Создать</a>
    <hr>

    <ul>
        @foreach ($projects as $project)
            <li><a href="{{ route('projects.show', $project->id) }}">{{ $project->project_name }}</a></li>
        @endforeach
    </ul>
@endsection
