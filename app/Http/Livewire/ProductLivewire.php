<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProductLivewire extends Component
{
    use LivewireAlert;

    public array $detail = [];

    public $categories;

    public $subCategories;

    public $brands;

    protected $listeners = ['bind'];

    public function mount()
    {
        $this->categories = Category::select(['id', 'name'])
            ->with('subCategory')
            ->get()
            ->toArray();
        $this->brands = Brand::select(['id', 'name'])->get()->toArray();
    }

    public function render()
    {
        if (isset($this->detail['category'])) {
            $this->subCategories = SubCategory::where('category_id', $this->detail['category']['id'])
                ->get()
                ->toArray();
        }

        return view('livewire.product-livewire');
    }

    public function store()
    {
         $this->validate([
            'detail.name' => 'required',
            'detail.category_id' => 'required',
            'detail.sub_category_id' => 'required',
            'detail.brand_id' => 'required',
            'detail.sku' => 'required',
            'detail.selling_price' => 'required',
            'detail.vendor_price' => 'required',
        ]);

        Product::create([
            'category_id' => $this->detail['category_id'],
            'sub_category_id' => $this->detail['sub_category_id'],
            'brand_id' => $this->detail['brand_id'],
            'name' => $this->detail['name'],
            'sku' => $this->detail['sku'],
            'selling_price' => $this->detail['selling_price'],
            'vendor_price' => $this->detail['vendor_price'],
            'created_by' => auth()->id()
        ]);

        $this->detail = [];
        $this->emit('refreshDatatable');
        $this->alert('success', 'Product is added!');
    }

    public function delete()
    {
        Product::find($this->detail['id'])->delete();
        $this->emit('refreshDatatable');
        session()->flash('message', 'Product Deleted Successfully.');
        $this->detail = [];
    }

    public function bind($id)
    {
        $this->detail = Product::with(['category', 'subCategory', 'brand'])
            ->find($id)
            ->toArray();
        $this->dispatchBrowserEvent('open-modal-crudModal');
    }

    public function update()
    {
        Product::updateOrCreate(
            ['id' => $this->detail['id']],
            [
                'category_id' => $this->detail['category_id'],
                'sub_category_id' => $this->detail['sub_category_id'],
                'brand_id' => $this->detail['brand_id'],
                'name' => $this->detail['name'],
                'sku' => $this->detail['sku'],
                'selling_price' => $this->detail['selling_price'],
                'vendor_price' => $this->detail['vendor_price'],
            ]
        );

        session()->flash('message', 'Product Updated Successfully.');
        $this->detail = [];
        $this->emit('refreshDatatable');
        $this->dispatchBrowserEvent('close-modal-crudModal');
    }
}
