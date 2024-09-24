<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\CourseService;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index()
    {
        $courses = Course::with('instructors')->get();
        return response()->json($courses);
    }

    public function store(StoreCourseRequest $request)
    {
        $course = $this->courseService->createCourse($request->validated());

        return response()->json($course, 201);
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course = $this->courseService->updateCourse($course, $request->validated());

        return response()->json($course);
    }

    public function destroy(Course $course)
    {
        $this->courseService->deleteCourse($course);

        return response()->json(null, 204);
    }
}
