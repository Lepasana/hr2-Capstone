<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function view($id)
    {
        // You can add logic to retrieve the course details from the database based on the ID
        // For now, let's assume it's a simple example:
        $course = [
            1 => 'Introduction to Company Policies',
            2 => 'Workplace Safety Training',
            3 => 'Customer Service Excellence'
        ];

        // Check if the course exists
        if (isset($course[$id])) {
            return view('course.view', ['courseName' => $course[$id]]);
        } else {
            abort(404, 'Course not found');
        }
    }
}
