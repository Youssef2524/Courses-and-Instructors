<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Services\InstructorService;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;

class InstructorController extends Controller
{
    protected $instructorService;

    public function __construct(InstructorService $instructorService)
    {
        $this->instructorService = $instructorService;
    }

    public function index()
    {
        $instructors = Instructor::with('courses')->get();
        return response()->json($instructors);
    }

    public function store(StoreInstructorRequest $request)
    {
        $instructor = $this->instructorService->createInstructor($request->validated());

        return response()->json($instructor, 201);
    }

    public function update(UpdateInstructorRequest $request, Instructor $instructor)
    {
        $instructor = $this->instructorService->updateInstructor($instructor, $request->validated());

        return response()->json($instructor);
    }

    public function destroy(Instructor $instructor)
    {
        $this->instructorService->deleteInstructor($instructor);

        return response()->json(null, 204);
    }
}
