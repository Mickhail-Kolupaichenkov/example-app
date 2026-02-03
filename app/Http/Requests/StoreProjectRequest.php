<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    /**
     * Правила валидации
     */
    public function rules(): array
    {
        return [
            'project_name' => 'required|string|max:100',
            'status_active' => 'boolean',
            'user_id' => 'required|exists:users,id',
            'assignee_id' => 'nullable|exists:users,id',
            'deadline_date' => 'required|date',
        ];
    }

    /**
     * Кастомные сообщения об ошибках
     */
    public function messages(): array
    {
        return [
            'project_name.required' => 'Название проекта обязательно для заполнения',
            'project_name.max' => 'Название проекта не должно превышать 100 символов',
            'user_id.required' => 'Необходимо указать создателя проекта',
            'user_id.exists' => 'Указанный создатель не существует',
            'assignee_id.exists' => 'Указанный ответственный не существует',
            'deadline_date.date' => 'Дедлайн должен быть датой',
        ];
    }

    /**
     * Кастомные названия атрибутов
     */
    public function attributes(): array
    {
        return [
            'project_name' => 'название проекта',
            'user_id' => 'создатель',
            'assignee_id' => 'ответственный',
            'deadline_date' => 'дедлайн',
        ];
    }
}
