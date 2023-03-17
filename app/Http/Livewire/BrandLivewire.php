<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class BrandLivewire extends Component
{
    use LivewireAlert;
    
    public array $detail = [];
    protected $listeners = ['bind'];

    public function bind($id)
    {
        $this->detail = Brand::find($id)->toArray();
        $this->dispatchBrowserEvent('open-modal-crudModal');
    }

    public function update()
    {
        Brand::updateOrCreate(
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
        Brand::find($this->detail['id'])->delete();

        $this->emit('refreshDatatable');
        session()->flash('message', 'Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal-crudModal');
        $this->detail = [];
    }

    public function store()
    {
        Brand::create([
            'name' => $this->detail['name'],
            'description' => 'description.',
            'created_by' => auth()->id()
        ]);

        $this->detail = [];
        $this->emit('refreshDatatable');
        $this->alert('success', 'Added Successfully!');
        $this->dispatchBrowserEvent('close-modal-crudModal');
    }

    public function render()
    {
        return view('livewire.brand-livewire');
    }
}
