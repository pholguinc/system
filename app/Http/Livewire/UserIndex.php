<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    protected $paginationTheme = 'bootstrap';
    use WithPagination;

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['render', 'delete', 'change'];

    public function render()
    {
        $users = User::where('id', 'like', '%' . $this->search . '%')
            ->orwhere('code', 'like', '%' . $this->search . '%')
            ->orwhere('first_name', 'like', '%' . $this->search . '%')
            ->orwhere('last_name', 'like', '%' . $this->search . '%')
            ->orwhere('dni', 'like', '%' . $this->search . '%')
            ->orwhere('email', 'like', '%' . $this->search . '%')
            ->orderby($this->sort, $this->direction)
            ->latest('id')
            ->paginate(8);
        return view('livewire.user-index', compact('users'));
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
}
