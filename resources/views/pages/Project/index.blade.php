@extends('pages.Project.layout')

@section('content')
    <h3>Список проектов:</h3>
    <hr>
    <a href="{{ route('projects.create') }}">Создать</a>
    <hr>

    @if ($projects->count() > 0)
        <ul>
            @foreach ($projects as $project)
                <li style="margin-bottom: 20px;">
                    <div>
                        <a href="{{ route('projects.show', $project->id) }}">
                            {{ $project->project_name }}
                        </a>
                    </div>
                    <div>
                        <small>
                            <div>
                                (Создатель: {{ $project->user_id }})
                            </div>
                            <div>
                                @can('update', $project)
                                    <a href="{{ route('projects.edit', $project->id) }}">[Редактировать]</a>
                                @endcan

                                @can('delete', $project)
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Удалить?')"
                                            style="border: none; background: none; color: red; cursor: pointer;">
                                            [X]
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </small>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>Проектов пока нет.</p>
    @endif
@endsection
