<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProductLivewire extends Component
{
    use LivewireAlert;

    public array $detail = [];

    protected $listeners = ['bind'];
   
    public function render()
    {
        return view('livewire.product-livewire');
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'detail.name' => 'required',
            'detail.category' => 'required',
            'detail.sub-category' => 'required',
            'detail.brand' => 'required',
            'detail.sku' => 'required',
            'detail.selling-price' => 'required',
            'detail.vendor-price' => 'required',
            'detail.unit' => 'required',
            'detail.qty' => 'required',
        ]);
  
        Product::create($validatedDate);
  
        $this->emit('refreshDatatable');
        $this->alert('success', 'Product is added!');
    }

    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        $this->productId = $productId;
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
  
        $product = Product::find($this->productId);
        $product->update([
            'name' => $this->name,
            'category' => $this->category,
            'description' => $this->description,
        ]);
  
        $this->emit('refreshDatatable');
        $this->alert('success', 'Product is updated!');
    }

    public function delete($productId)
    {
        Product::find($productId)->delete();
        session()->flash('message', 'Product Deleted Successfully.');
    }
}
