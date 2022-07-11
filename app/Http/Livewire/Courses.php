<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Support\Facades\DB;

class Courses extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    /*public $selectedLevels = [];*/

    protected $listeners = ['render', 'delete', 'change'];

    public $selected_id, $keyWord, $code, $course_name, $course_description, $status, $level_id;
    public $updateMode = false;

    public function render()
    {
        $levels = Level::pluck('name', 'id');
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.courses.view', [
            'courses' => Course::latest()
                ->orWhere('code', 'LIKE', $keyWord)
                ->orWhere('course_name', 'LIKE', $keyWord)
                ->orWhere('course_description', 'LIKE', $keyWord)
                ->orWhere('status', 'LIKE', $keyWord)
                ->with('levels')
                ->paginate(10),
        ], compact('levels'));
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
        $this->code = null;
        $this->course_name = null;
        $this->course_description = null;
    }

    public function store()
    {
        $this->validate([
            'code' => 'required',
            'course_name' => 'required',
            'course_description' => 'required',
        ]);

        Course::create([
            'code' => $this->code,
            'course_name' => $this->course_name,
            'course_description' => $this->course_description,
        ]);

        $this->resetInput();
        $this->emit('render');
        $this->emit('alert', '¡El curso se creó correctamente!');
    }

    public function edit($id)
    {
        $record = Course::findOrFail($id);

        $this->selected_id = $id;
        $this->code = $record->code;
        $this->course_name = $record->course_name;
        $this->course_description = $record->course_description;
        $this->updateMode = true;

    }

    public function update()
    {
        $this->validate([
            'code' => 'required',
            'course_name' => 'required',
            'course_description' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Course::find($this->selected_id);
            $record->update([
                'code' => $this->code,
                'course_name' => $this->course_name,
                'course_description' => $this->course_description,
            ]);

            $this->resetInput();
            $this->updateMode = false;
            $this->emit('alert', '¡El curso se actualizó correctamente!');
        }
    }

    /*public function destroy($id)
    {
        if ($id) {
            $record = Course::where('id', $id);
            $record->delete();
        }
    }*/
    public function delete(Course $course)
    {
        $course->delete();
    }

    public function change($id)
    {
        $courses = DB::table('courses')
            ->select('status')
            ->where('id', '=', $id)
            ->first();
        if ($courses->status == 'Activo') {
            $status = 'Inactivo';
        } else {
            $status = 'Activo';
        }

        $values = array('status' => $status);
        DB::table('courses')->where('id', $id)->update($values);
    }
}
