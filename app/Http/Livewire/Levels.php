<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Level;

class Levels extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.levels.view', [
            'levels' => Level::latest()
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

        Level::create([ 
			'name' => $this-> name
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Level Successfully created.');
    }

    public function edit($id)
    {
        $record = Level::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Level::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Level Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Level::where('id', $id);
            $record->delete();
        }
    }
}
