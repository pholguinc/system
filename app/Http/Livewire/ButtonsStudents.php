<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ButtonsStudents extends Component
{
    public function prev_page(){
        $this->resetValidation();
        return redirect()->route('admin.students.index');
    }

    public function clearData()
    {
        $this->reset();
        $this->resetValidation();
        return redirect()->route('admin.students.index');
    }

    public function render()
    {
        return view('livewire.buttons-students');
    }
}
