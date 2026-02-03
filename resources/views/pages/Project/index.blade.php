@extends('pages.project.layout')

@section('content')
    <h3>Список проектов:</h3>
    <hr>
    <a href="{{ route('projects.create') }}">Создать</a>
    <hr>

    @if ($projects->count() > 0)
        <ul>
            @foreach ($projects as $project)
                <li>
                    <a href="{{ route('projects.show', $project->id) }}">
                        {{ $project->project_name }}
                    </a>
                    -
                    @if ($project->status_active)
                        Активен
                    @else
                        Неактивен
                    @endif

                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Удалить проект {{ $project->project_name }}?')">X</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Проектов пока нет.</p>
    @endif
@endsection
