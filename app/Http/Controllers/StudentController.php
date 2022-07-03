<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){

        $students = Student::with('levels')->get();
        /*return view('admin.students.index', compact('students'));*/
        return $students;
    }
}
