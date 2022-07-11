<?php

namespace App\Http\Livewire;

use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class Students extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';

    protected $listeners = ['render', 'delete', 'change'];

    public $selected_id, $keyWord, $code, $first_name, $last_name, $dni, $email, $address, $birthday, $parents_name, $phone, $status, $level_id;
    public $updateMode = false;

    public function render()
    {
        $levels = Level::pluck('name', 'id');
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.students.view', [
            'students' => Student::latest()
						->orWhere('code', 'LIKE', $keyWord)
						->orWhere('first_name', 'LIKE', $keyWord)
						->orWhere('last_name', 'LIKE', $keyWord)
						->orWhere('dni', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('address', 'LIKE', $keyWord)
						->orWhere('birthday', 'LIKE', $keyWord)
						->orWhere('parents_name', 'LIKE', $keyWord)
						->orWhere('phone', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('level_id', 'LIKE', $keyWord)
                        ->with('levels')
						->paginate(10),
        ], compact('levels'));

        /*$students = Student::with('levels')->get();
        return view('livewire.students.view', compact('students'));*/
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->code = null;
		$this->first_name = null;
		$this->last_name = null;
		$this->dni = null;
		$this->email = null;
		$this->address = null;
		$this->birthday = null;
		$this->parents_name = null;
		$this->phone = null;
		$this->level_id = null;
    }

    public function store()
    {
        $this->validate([
		'code' => 'required',
		'first_name' => 'required',
		'last_name' => 'required',
		'dni' => 'required',
		'email' => 'required',
		'address' => 'required',
		'birthday' => 'required',
		'parents_name' => 'required',
		'phone' => 'required',
        ]);

        Student::create([
			'code' => $this->code,
			'first_name' => $this->first_name,
			'last_name' => $this->last_name,
			'dni' => $this->dni,
			'email' => $this->email,
			'address' => $this->address,
			'birthday' => $this->birthday,
			'parents_name' => $this->parents_name,
			'phone' => $this->phone,
			'level_id' => $this->level_id
        ]);

        $this->resetInput();
        $this->emit('render');
        $this->emit('alert', '¡La categoría se creó correctamente!');
    }

    public function edit($id)
    {
        $record = Student::findOrFail($id);

        $this->selected_id = $id;
		$this->code = $record-> code;
		$this->first_name = $record-> first_name;
		$this->last_name = $record-> last_name;
		$this->dni = $record-> dni;
		$this->email = $record-> email;
		$this->address = $record-> address;
		$this->birthday = $record-> birthday;
		$this->parents_name = $record-> parents_name;
		$this->phone_home = $record-> phone_home;
		$this->phone_parent = $record-> phone_parent;
		$this->status = $record-> status;
		$this->level_id = $record-> level_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'code' => 'required',
		'first_name' => 'required',
		'last_name' => 'required',
		'dni' => 'required',
		'email' => 'required',
		'address' => 'required',
		'birthday' => 'required',
		'parents_name' => 'required',
		'phone_home' => 'required',
		'phone_parent' => 'required',
		'status' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Student::find($this->selected_id);
            $record->update([
			'code' => $this-> code,
			'first_name' => $this-> first_name,
			'last_name' => $this-> last_name,
			'dni' => $this-> dni,
			'email' => $this-> email,
			'address' => $this-> address,
			'birthday' => $this-> birthday,
			'parents_name' => $this-> parents_name,
			'phone_home' => $this-> phone_home,
			'phone_parent' => $this-> phone_parent,
			'status' => $this-> status,
			'level_id' => $this-> level_id
            ]);

            $this->updateMode = false;
            $this->emit('alert', '¡El alumno se actualizó correctamente!');
        }
    }

    /*public function destroy($id)
    {
        if ($id) {
            $record = Student::where('id', $id);
            $record->delete();
        }
    }*/

    public function delete(Student $student)
    {
        $student->delete();
    }

    public function change($id)
    {
        $students = DB::table('students')
            ->select('status')
            ->where('id', '=', $id)
            ->first();
        if ($students->status == 'Activo') {
            $status = 'Inactivo';
        } else {
            $status = 'Activo';
        }

        $values = array('status' => $status);
        DB::table('students')->where('id', $id)->update($values);
    }
}
