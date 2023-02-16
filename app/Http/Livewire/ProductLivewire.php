<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductLivewire extends Component
{
    public $name, $category, $description, $id;
    public $updateMode = false;
   
    public function render()
    {
        return view('livewire.product-livewire');
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);
  
        Product::create($validatedDate);
  
        session()->flash('message', 'Product Created Successfully.');
  
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->id = $id;
        $this->category = $product->category;
        $this->description = $product->description;
  
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);
  
        $product = Product::find($this->post_id);
        $product->update([
            'name' => $this->name,
            'category' => $this->category,
            'description' => $this->description,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Product Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Product Deleted Successfully.');
    }
}
