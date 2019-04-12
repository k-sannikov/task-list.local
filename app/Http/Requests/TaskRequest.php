<?php

namespace App\Http\Requests;

use App\Model\Task;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TaskRequest;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $task = Task::find($this->route('task'));
        if (isset($task)) {
            if (Auth::id() !== $task->user_id) {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'priority' => 'required|integer|between:1,3'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Необходимо ввести название задачи',
            'name.max' => 'Название задачи должно быть короче :max символов',
            'priority.required' => 'Необходимо выбрать приоритет выполнения задачи',
            'priority.integer' => 'Приоритет должен быть целым числом',
            'priority.between' => 'Текущий приоритет :input. Ранг приоритета должен быть от :min до :max',
        ];
    }
}
