<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    /**
     * Список проектов
     *
     * GET /projects
     */
    public function index(): View
    {
        Gate::authorize('viewAny', Project::class);

        $projects = Project::all();

        return view('pages.project.index', compact('projects'));
    }

    /**
     * Показ 1 проекта
     *
     * GET /projects/{project}
     */
    public function show(int $project): View
    {
        $project = Project::findOrFail($project);

        Gate::authorize('view', $project);

        return view('pages.project.show', compact('project'));
    }

    /**
     * Форма создания проекта
     *
     * GET /projects/create
     */
    public function create(): View
    {
        Gate::authorize('create', Project::class);

        return view('pages.project.create');
    }

    /**
     * Создание проекта
     *
     * POST /projects
     */
    public function store(StoreProjectRequest $request): RedirectResponse
    {
        Gate::authorize('create', Project::class);

        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        Project::create($validated);

        //Создаем проект и редиректим
        return redirect()->route('projects.index');
    }

    /**
     * Форма редактирования проекта
     *
     * GET /projects/{project}/edit
     */
    public function edit(int $project): View
    {
        $project = Project::findOrFail($project);

        Gate::authorize('update', $project);

        return view('pages.project.edit', compact('project'));
    }

    /**
     * Обновление редактированого проекта
     *
     * PUT /projects/{project}
     */
    public function update(UpdateProjectRequest $request, int $project): RedirectResponse
    {
        $project = Project::findOrFail($project);

        Gate::authorize('update', $project);

        $validated = $request->validated();

        $project->update($validated);

        //Обновили проект и редиректим
        return redirect()->route('projects.show', $project);
    }

    /**
     * Удаление проекта
     *
     * DELETE /projects/{project}
     */
    public function destroy(int $project): RedirectResponse
    {
        $project = Project::findOrFail($project);

        Gate::authorize('delete', $project);

        $project->delete();
        //Удалили проект и редиректим
        return redirect()->route('projects.index');
    }
}
