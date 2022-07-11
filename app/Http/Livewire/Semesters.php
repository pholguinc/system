<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Semester;
use Illuminate\Support\Facades\DB;

class Semesters extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';

    protected $listeners = ['render', 'delete', 'change'];

    public $selected_id, $keyWord, $name;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.semesters.view', [
            'semesters' => Semester::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->name = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
        ]);

        Semester::create([
			'name' => $this-> name,
        ]);

        $this->resetInput();
		$this->emit('render');
        $this->emit('alert', '¡El semestre se creó correctamente!');
    }

    public function edit($id)
    {
        $record = Semester::findOrFail($id);

        $this->selected_id = $id;
		$this->name = $record-> name;
		$this->status = $record-> status;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'status' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Semester::find($this->selected_id);
            $record->update([
			'name' => $this-> name,
			'status' => $this-> status
            ]);

            $this->resetInput();
            $this->updateMode = false;
			$this->emit('alert', '¡El semestre se actualizó correctamente!');
        }
    }

    /*public function destroy($id)
    {
        if ($id) {
            $record = Semester::where('id', $id);
            $record->delete();
        }
    }*/

    public function delete(Semester $semester)
    {
        $semester->delete();
    }

    public function change($id)
    {
        $semesters = DB::table('semesters')
            ->select('status')
            ->where('id', '=', $id)
            ->first();
        if ($semesters->status == 'Activo') {
            $status = 'Inactivo';
        } else {
            $status = 'Activo';
        }

        $values = array('status' => $status);
        DB::table('semesters')->where('id', $id)->update($values);
    }
}
