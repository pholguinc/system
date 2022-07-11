<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Users extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['render', 'delete', 'change'];

    public $selected_id, $keyWord, $code, $first_name, $last_name, $email, $dni, $phone, $address, $birthday, $password;
    public $updateMode = false;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.users.view', [
            'users' => User::latest()
                ->orWhere('code', 'LIKE', $keyWord)
                ->orWhere('first_name', 'LIKE', $keyWord)
                ->orWhere('last_name', 'LIKE', $keyWord)
                ->orWhere('email', 'LIKE', $keyWord)
                ->orWhere('dni', 'LIKE', $keyWord)
                ->orWhere('phone', 'LIKE', $keyWord)
                ->orWhere('address', 'LIKE', $keyWord)
                ->orWhere('birthday', 'LIKE', $keyWord)
                ->orWhere('status', 'LIKE', $keyWord)
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
        $this->password = null;
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
            'password' => 'required'
        ]);

        User::create([
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
        $this->emit('alert', '¡La categoría se creó correctamente!');
    }

    public function edit($id)
    {

        $record = User::where('id',$id)->first();

        $this->selected_id = $id;
        $this->code = $record->code;
        $this->first_name = $record->first_name;
        $this->last_name = $record->last_name;
        $this->email = $record->email;
        $this->dni = $record->dni;
        $this->phone = $record->phone;
        $this->address = $record->address;
        $this->birthday = $record->birthday;
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
            $record = User::find($this->selected_id);
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
            $this->emit('alert', '¡El usuario se actualizó correctamente!');
        }
    }

    /*public function destroy($id)
    {
        if ($id) {
            $record = User::where('id', $id);
            $record->delete();
        }
    }*/

    public function delete(User $user)
    {
        $user->delete();
    }

    public function change($id)
    {
        $users = DB::table('users')
            ->select('status')
            ->where('id', '=', $id)
            ->first();
        if ($users->status == 'Activo') {
            $status = 'Inactivo';
        } else {
            $status = 'Activo';
        }

        $values = array('status' => $status);
        DB::table('users')->where('id', $id)->update($values);
    }
}


