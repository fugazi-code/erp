<?php

namespace App\Http\Livewire;

use App\Enums\SalesPaymentEnum;
use App\Enums\SalesStatusEnum;
use App\Models\Category;
use App\Models\OrderDetail;
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

        if (!$this->sale) {
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
        $this->cart = $this->sale->orders->toArray();
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

    public function addToCart($productId, $price, $name, $sku)
    {
        $sale = Sale::with('orders')->find($this->sale->id);

        $order = $sale->orders()->updateOrCreate(
            ['product_id' => $productId],
            [
                'product_id' => $productId,
                'name' => $name,
                'sku' => $sku,
                'price' => $price,
            ]
        );

        $order->increment('qty', 1);
        $sale->orders()->updateOrCreate(
            ['product_id' => $productId],
            ['sub_total' => $order->qty * $order->price]
        );

        $this->cart = Sale::with('orders')->find($this->sale->id)->toArray()['orders'];
    }

    public function removeFromCart($id)
    {
        OrderDetail::destroy($id);

        $this->cart = Sale::with('orders')->find($this->sale->id)->toArray()['orders'];
    }

    public function minusFromCart($id)
    {
        $order = OrderDetail::find($id);
        
        $decrement = $order->qty - 1;
        if($decrement > 0) {
            $order->qty = $decrement;
            $order->sub_total = $decrement * $order->price;
            $order->save();
        }

        $this->cart = Sale::with('orders')->find($this->sale->id)->toArray()['orders'];
    }

    public function updatedTax($value)
    {
    }

    public function clearOrders()
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
