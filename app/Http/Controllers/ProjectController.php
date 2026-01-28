<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Список проектов
     *
     * GET /projects
     */
    public function index(): View
    {
        $projects = [
            ['id' => 1, 'title' => 'Проект 1', 'description' => 'Описание проекта 1'],
            ['id' => 2, 'title' => 'Проект 2', 'description' => 'Описание проекта 2'],
        ];

        return view('pages.project.index', compact('projects'));
    }

    /**
     * Показ 1 проекта
     *
     * GET /projects/{project}
     */
    public function show(int $project): View
    {
        $project = [
            'id' => $project,
            'title' => "Проект {$project}",
            'description' => "Описание проекта {$project}"
        ];

        return view('pages.project.show', compact('project'));
    }

    /**
     * Форма создания проекта
     *
     * GET /projects/create
     */
    public function create(): View
    {
        return view('pages.project.create');
    }

    /**
     * Создание проекта
     *
     * POST /projects
     */
    public function store(): RedirectResponse
    {
        //Создаем проект и редиректим
        return redirect()->route('projects.index');
    }

    /**
     * Форма редактирования проекта
     *
     * GET /projects/{project}/edit
     */
    public function edit($project): View
    {
        $project = [
            'id' => $project,
            'title' => "Проект {$project}",
            'description' => "Описание проекта {$project}"
        ];

        return view('pages.project.edit', compact('project'));
    }

    /**
     * Обновление редактированого проекта
     *
     * PUT /projects/{project}
     */
    public function update($project): RedirectResponse
    {
        //Обновили проект и редиректим
        return redirect()->route('projects.show', $project);
    }

    /**
     * Удаление проекта
     *
     * DELETE /projects/{project}
     */
    public function destroy($project): RedirectResponse
    {
        //Удалили проект и редиректим
        return redirect()->route('projects.index');
    }
}
