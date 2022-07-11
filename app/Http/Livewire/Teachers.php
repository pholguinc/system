<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class Teachers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['render', 'delete', 'change'];

    public $selected_id, $keyWord, $code, $first_name, $last_name, $email, $dni, $phone, $address, $birthday, $status, $password;
    public $updateMode = false;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.teachers.view', [
            'teachers' => Teacher::latest()
                ->orWhere('code', 'LIKE', $keyWord)
                ->orWhere('first_name', 'LIKE', $keyWord)
                ->orWhere('last_name', 'LIKE', $keyWord)
                ->orWhere('email', 'LIKE', $keyWord)
                ->orWhere('dni', 'LIKE', $keyWord)
                ->orWhere('phone', 'LIKE', $keyWord)
                ->orWhere('address', 'LIKE', $keyWord)
                ->orWhere('birthday', 'LIKE', $keyWord)
                ->orWhere('status', 'LIKE', $keyWord)
                ->with('courses')
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
        $this->code = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->dni = null;
        $this->phone = null;
        $this->address = null;
        $this->birthday = null;
        $this->status = null;
    }

    public function store()
    {
        $this->validate([
            'code' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'dni' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'password' => 'required',
        ]);

        Teacher::create([
            'code' => $this->code,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'dni' => $this->dni,
            'phone' => $this->phone,
            'address' => $this->address,
            'birthday' => $this->birthday,
            'password' => $this->password
        ]);

        $this->resetInput();
        $this->emit('render');
        $this->emit('alert', '¡El docente se creó correctamente!');
    }

    public function edit($id)
    {
        $record = Teacher::findOrFail($id);

        $this->selected_id = $id;
        $this->code = $record->code;
        $this->first_name = $record->first_name;
        $this->last_name = $record->last_name;
        $this->email = $record->email;
        $this->dni = $record->dni;
        $this->phone = $record->phone;
        $this->address = $record->address;
        $this->birthday = $record->birthday;
        $this->status = $record->status;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'code' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'dni' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'birthday' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Teacher::find($this->selected_id);
            $record->update([
                'code' => $this->code,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'dni' => $this->dni,
                'phone' => $this->phone,
                'address' => $this->address,
                'birthday' => $this->birthday,
            ]);

            $this->resetInput();
            $this->updateMode = false;
            $this->emit('alert', '¡El docente se actualizó correctamente!');
        }
    }

    /*public function destroy($id)
    {
        if ($id) {
            $record = Teacher::where('id', $id);
            $record->delete();
        }
    }*/

    public function delete(Teacher $teacher)
    {
        $teacher->delete();
    }

    public function change($id)
    {
        $teachers = DB::table('teachers')
            ->select('status')
            ->where('id', '=', $id)
            ->first();
        if ($teachers->status == 'Activo') {
            $status = 'Inactivo';
        } else {
            $status = 'Activo';
        }

        $values = array('status' => $status);
        DB::table('teachers')->where('id', $id)->update($values);
    }
}
