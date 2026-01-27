<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(): string
    {
        return 'Список проектов';
    }

    public function show($project): string
    {
        return "Проект №{$project}";
    }

    public function create(): string
    {
        return 'Форма создания проекта';
    }

    public function store(): RedirectResponse
    {
        //Создаем проект и редиректим
        return redirect()->route('projects.index');
    }

    public function edit($project): string
    {
        return "Форма редактирования поста №{$project}";
    }

    public function update($project): RedirectResponse
    {
        //Обновили проект и редиректим
        return redirect()->route('projects.show', $project);
    }

    public function destroy($project): RedirectResponse
    {
        //Удалили проект и редиректим
        return redirect()->route('projects.index');
    }
}
