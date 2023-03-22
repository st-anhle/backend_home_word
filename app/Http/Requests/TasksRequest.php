<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TasksRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'due_date' => 'required',
            'assignee' => 'required',
            'estimate' => 'required',
            'actual' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required!',
            'description.required' => 'description is required!',
            'type.required' => 'type is required!',
            'status.required' => 'status is required!',
            'start_date.required' => 'start_date is required!',
            'due_date.required' => 'due_date is required!',
            'assignee.required' => 'assignee is required!',
            'estimate.required' => 'estimate is required!',
            'actual.required' => 'actual is required!',
        ];
    }

}
