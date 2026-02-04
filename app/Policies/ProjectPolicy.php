<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
{
    /**
     * Просматривать список проектов может любой авторизованный пользователь
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Конкретный проект может просматривать любой авторизованный пользователь
     */
    public function view(User $user, Project $project): bool
    {
        return true;
    }

    /**
     * Создавать проект может любой авторизованный пользователь
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Админ может редактировать любой проект
     * Обычный пользователь может редактировать только свой проект
     */
    public function update(User $user, Project $project): bool
    {
        // Админ может редактировать любые проекты
        if ($user->role === 'admin') {
            return true;
        }

        // Обычный пользователь может редактировать только свои проекты
        return $user->id === $project->user_id;
    }

    /**
     * Админ может удалять любой проект
     * Обычный пользователь может удалять только свой проект
     */
    public function delete(User $user, Project $project): bool
    {
        // Админ может удалять любые проекты
        if ($user->role === 'admin') {
            return true;
        }

        // Обычный пользователь может удалять только свои проекты
        return $user->id === $project->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Project $project): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Project $project): bool
    {
        return false;
    }
}
