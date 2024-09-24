<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{
    public function createCourse(array $data)
    {
        $course = Course::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'start_date' => $data['start_date'],
        ]);

        if (isset($data['instructor_ids'])) {
            $course->instructors()->attach($data['instructor_ids']);
        }

        return $course->load('instructors');
    }

    public function updateCourse(Course $course, array $data)
    {
        $course->update($data);

        if (isset($data['instructor_ids'])) {
            $course->instructors()->sync($data['instructor_ids']);
        }
        return $course->load('instructors');
    }

    public function deleteCourse(Course $course)
    {
        $course->delete();
    }
}
