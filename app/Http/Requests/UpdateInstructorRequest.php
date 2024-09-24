<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInstructorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string',
            'experience' => 'sometimes|integer',
            'specialty' => 'sometimes|string',
            'course_ids' => 'sometimes|array',
        ];
    }
}
