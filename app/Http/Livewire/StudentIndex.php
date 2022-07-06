<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class StudentIndex extends Component
{
    protected $paginationTheme = 'bootstrap';
    use WithPagination;

    public $search;
    public $sort ='id';
    public $direction = 'desc';

    protected $listeners = ['render', 'delete', 'change'];

    public function render()
    {
        $students = Student::where('id', 'like', '%' .$this->search. '%')
                            ->orwhere('code', 'like', '%' .$this->search. '%')
                            ->orwhere('first_name', 'like', '%' .$this->search. '%')
                            ->orwhere('last_name', 'like', '%' .$this->search. '%')
                            ->orwhere('dni', 'like', '%' .$this->search. '%')
                            ->orwhere('email', 'like', '%' .$this->search. '%')
                            ->orderby($this->sort, $this->direction)
                            ->latest('id')
                            ->with('levels')->paginate(8);

        /*->paginate(8)*/
        return view('livewire.student-index', compact('students'));
    }

    public function order($sort)
    {

        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction == 'asc';
            } else {
                $this->direction == 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction == 'asc';
        }
    }

    public function delete(Student $student)
    {
        $student->delete();

    }

    public function change($id)
    {


        $users = DB::table('students')
                    ->select('status')
                    ->where('id', '=', $id)
                    ->first();
        if($users->status == 'Activo'){
            $status = 'Inactivo';
        }else{
            $status = 'Activo';

        }

        $values = array('status' => $status);
        DB::table('students')->where('id', $id)->update($values);

    }

}
