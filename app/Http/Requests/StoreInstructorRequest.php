<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstructorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'experience' => 'required|integer',
            'specialty' => 'required|string',
            'course_ids' => 'sometimes|array',
        ];
    }
}
