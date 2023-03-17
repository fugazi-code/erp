<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SubCategoryLivewire extends Component
{
    use LivewireAlert;

    public array $detail = [];
    public $categories;
    protected $listeners = ['bind'];

    public function bind($id)
    {
        $this->detail = SubCategory::find($id)->toArray();
        $this->dispatchBrowserEvent('open-modal-crudModal');
    }

    public function update()
    {
        SubCategory::updateOrCreate(
            ['id' => $this->detail['id']],
            [
                'name' => $this->detail['name'],
                'category_id' =>  $this->detail['category_id'],
            ]
        );

        session()->flash('message', 'Updated Successfully.');
        $this->detail = [];
        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('close-modal-crudModal');
    }

    public function delete()
    {
        SubCategory::find($this->detail['id'])->delete();

        $this->emit('refreshDatatable');
        session()->flash('message', 'Deleted Successfully.');
        $this->dispatchBrowserEvent('close-modal-crudModal');
        $this->detail = [];
    }

    public function store()
    {
        SubCategory::create([
            'name' => $this->detail['name'],
            'category_id' =>  $this->detail['category_id'],
            'description' => 'description',
            'created_by' => auth()->id()
        ]);

        $this->detail = [];
        $this->emit('refreshDatatable');
        $this->alert('success', 'Added Successfully!');
        $this->dispatchBrowserEvent('close-modal-crudModal');
    }

    public function render()
    {
        $this->categories = Category::select(['id', 'name'])
            ->get()
            ->toArray();

        return view('livewire.sub-category-livewire');
    }
}
