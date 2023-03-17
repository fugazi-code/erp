<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CategoryLivewire extends Component
{
    use LivewireAlert;
    
    public array $detail = [];
    protected $listeners = ['bind'];

    public function bind($id)
    {
        $this->detail = Category::find($id)->toArray();
        $this->dispatchBrowserEvent('open-modal-crudModal');
    }

    public function render()
    {
        return view('livewire.category-livewire');
    }

    public function update()
    {
        Category::updateOrCreate(
            ['id' => $this->detail['id']],
            ['name' => $this->detail['name']]
        );

        session()->flash('message', 'Updated Successfully.');
        $this->detail = [];
        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('close-modal-crudModal');
    }

    public function delete()
    {
        Category::find($this->detail['id'])->delete();

        $this->emit('refreshDatatable');
        session()->flash('message', 'Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal-crudModal');
        $this->detail = [];
    }

    public function store()
    {
        Category::create([
            'name' => $this->detail['name'], 
            'created_by' => auth()->id()
        ]);

        $this->detail = [];
        $this->emit('refreshDatatable');
        $this->alert('success', 'Added Successfully!');
        $this->dispatchBrowserEvent('close-modal-crudModal');
    }
}
