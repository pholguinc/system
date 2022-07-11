<?php

namespace App\Http\Livewire;

use App\Models\Teacher;
use Livewire\Component;

class Attendance extends Component
{
    public function render()
    {
        $teachers = Teacher::where('user_id', auth()->user())->with('courses')->get();
        return view('livewire.teachers.modules.attendance.index', compact('teachers'));
    }
}
