<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class DevController extends Controller
{
    public function index(Request $request, string $action = null)
    {
        if ($action === null) {
            $result = '<p>Available actions:</p><ul>';
            foreach (array_diff(get_class_methods($this), get_class_methods(Controller::class)) as $method) {
                if ($method !== 'index') {
                    $result .= '<li><a href="/dev/' . $method . '">' . $method . '</a></li>';
                }
            }

            return $result . '</ul>';
        }

        if (method_exists($this, $action)) {
            return $this->{$action}($request);
        }

        return null;
    }
    public function test() {}

    /**
     * Добавляем 5 проектов со случайно сгенерированными данными
     */
    public function addProject(Request $request)
    {
        $faker = Faker::create();
        
        $userIds = User::pluck('id')->toArray();
        
        for ($i = 0; $i < 5; $i++) {
            Project::create([
                'project_name' => $faker->word(),
                'status_active' => $faker->boolean(),
                'user_id' => $faker->randomElement($userIds),
                'assignee_id' => $faker->randomElement($userIds),
                'deadline_date' => $faker->dateTimeBetween('+1 week', '+1 month'),
            ]);
        }
        
        return 'Добавлено 5 проектов';
    }

    /**
     * Получаем проекты админов вместе с их владельцами
     */
    public function getAdminProjects(Request $request)
    {
        $projects = Project::with('owner')
            ->whereHas('owner', function ($query) {
                $query->where('role', 'admin');
            })
            ->get();
        
        return $projects;
    }

    /**
     * Получаем проекты с истекшим дедлайном, упорядоченные по возрастанию дедлайна
     */
    public function getExpired(Request $request)
    {
        $projects = Project::where('deadline_date', '<', now())
            ->orderBy('deadline_date', 'asc')
            ->get();
        
        return $projects;
    }

    /**
     * Получаем один случайный проект и обновляем его настройки
     */
    public function updateRandom(Request $request)
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray();
        
        $project = Project::inRandomOrder()->first();
        
        $project->update([
            'project_name' => $faker->word(),
            'status_active' => $faker->boolean(),
            'user_id' => $faker->randomElement($userIds),
            'assignee_id' => $faker->randomElement($userIds),
            'deadline_date' => $faker->dateTimeBetween('+1 week', '+1 month'),
        ]);
        
        return 'Рандомный проект обновлен';
    }
}
