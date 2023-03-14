<?php

namespace App\Http\Livewire;

use App\Enums\SalesPaymentEnum;
use App\Enums\SalesStatusEnum;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
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
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['count'] += 1;
        } else {
            $product = Product::find($productId)->toArray();
            $this->cart[$productId] = [
                'details' => $product,
                'price' => $product['selling_price'],
                'count' => 1
            ];
        }

        $this->countItemsInCart();
    }

    public function updatedTax($value)
    {
        $this->countItemsInCart();
    }

    public function countItemsInCart()
    {
        $this->totalItems = 0;
        $this->subTotal = 0;
        foreach($this->cart as $item){
            $this->totalItems += $item['count'];
            $this->subTotal += $item['count'] * $item['price'];
        }

        $this->total = ($this->tax ?: 0) + $this->subTotal;
    }

    public function clearOrders()
    {
        $this->subTotal = 0;
        $this->totalItems = 0;
        $this->cart = [];
    }

    public function removeFromCart($id)
    {
        $this->cart = array_filter($this->cart, function($k) use ($id) {
            return $k != $id;
        }, ARRAY_FILTER_USE_KEY);

        $this->countItemsInCart();
    }

    public function voidOrder()
    {
        $sale = Sale::find($this->sale->id);
        $sale->status = SalesStatusEnum::VOID;
        $sale->save();

        return redirect()->route('kuys.layout');
    }
}
