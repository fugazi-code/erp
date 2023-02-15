<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class PointOfSaleLivewire extends Component
{
    public mixed $categories;

    public mixed $products;

    public array $cart = [];

    public $totalItems = 0;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.point-of-sale-livewire')->layout('layout.app-clean');
    }

    public function getProducts($category_id)
    {
        $this->products = Product::with(['subCategory'])
            ->where('category_id', $category_id)
            ->get();
    }

    public function addToCart($productId)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['count'] += 1;
        } else {
            $this->cart[$productId] = [
                'details' => Product::find($productId)->toArray(),
                'count' => 1
            ];
        }

        $this->totalItems = 0;
        foreach($this->cart as $item){
            $this->totalItems += $item['count'];
        }
    }

    public function clearOrders()
    {
        $this->totalItems = 0;
        $this->cart = [];
    }
}
