<?php

namespace App\Http\Livewire;

use App\Models\Level;
use App\Models\Student;
use Livewire\Component;

class FormStudent extends Component
{
    public function render()
    {
        $student = Student::all();

        /*return view('livewire.form-student', compact('student'));*/
        return $student;
    }
}
