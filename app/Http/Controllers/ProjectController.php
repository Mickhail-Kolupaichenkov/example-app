<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Список проектов
     *
     * GET /projects
     */
    public function index(): string
    {
        return 'Список проектов';
    }

    /**
     * Показ 1 проекта
     *
     * GET /projects/{project}
     */
    public function show($project): string
    {
        return "Проект №{$project}";
    }

    /**
     * Форма создания проекта
     *
     * GET /projects/create
     */
    public function create(): string
    {
        return 'Форма создания проекта';
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
    public function edit($project): string
    {
        return "Форма редактирования поста №{$project}";
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
