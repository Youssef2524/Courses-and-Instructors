<?php

namespace App\Services;

use App\Models\Instructor;

class InstructorService
{
    public function createInstructor(array $data)
    {
        $instructor = Instructor::create([
            'name' => $data['name'],
            'experience' => $data['experience'],
            'specialty' => $data['specialty'],
        ]);

        if (isset($data['course_ids'])) {
            $instructor->courses()->attach($data['course_ids']);
        }

        return $instructor->load('courses');
    }

    public function updateInstructor(Instructor $instructor, array $data)
    {
        $instructor->update($data);

        if (isset($data['course_ids'])) {
            $instructor->courses()->sync($data['course_ids']);
        }

        return $instructor->load('courses');
    }

    public function deleteInstructor(Instructor $instructor)
    {
        $instructor->delete();
    }
}
