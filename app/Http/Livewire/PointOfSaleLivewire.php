<?php

namespace App\Http\Livewire;

use App\Enums\SalesPaymentEnum;
use App\Enums\SalesStatusEnum;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PointOfSaleLivewire extends Component
{
    public mixed $categories;

    public mixed $products;

    public array $cart = [];

    public $totalItems = 0;

    public $subTotal = 0;

    public $tax = 0;

    public $total = 0;

    public $table;

    public $sale;

    protected $queryString = ['table'];

    public function mount()
    {
        // Check if there is inprogress table
        $this->sale = Sale::query()
            ->where('table', $this->table)
            ->where('status', SalesStatusEnum::INPROGRESS)
            ->first();

        if(!$this->sale) {
            $this->sale = Sale::create([
                "sale_date" => now(),
                "order_tax" => 0,
                "discount" => 0,
                "shipping" => 0,
                "status" => SalesStatusEnum::INPROGRESS,
                "payment" => SalesPaymentEnum::UNPAID,
                "table" => $this->table,
                "created_by" => auth()->id()
            ]);
        }

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

    }

    public function updatedTax($value)
    {

    }

    public function clearOrders()
    {

    }

    public function removeFromCart($id)
    {

    }

    public function voidOrder()
    {
        $sale = Sale::find($this->sale->id);
        $sale->status = SalesStatusEnum::VOID;
        $sale->save();

        return redirect()->route('kuys.layout');
    }
}
