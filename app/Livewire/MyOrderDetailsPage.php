<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductPriceRange;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Order Details - Shutkiz')]
class MyOrderDetailsPage extends Component
{
    public $order_id;

    public function mount($order_id){
        $this->order_id = $order_id;
    }

    public function render()
    {
        $order_items = OrderItem::with('product')->where('order_id', $this->order_id)->get();
        $priceRanges = ProductPriceRange::select('id', 'weight')->get();
        $address     = Address::where('order_id', $this->order_id)->first();
        $order       = Order::where('id', $this->order_id)->first();
        //dd( $priceRanges );
        return view('livewire.my-order-details-page',[
            'order_items' => $order_items,
            'address' => $address,
            'order' => $order,
            'priceRanges' => $priceRanges,
        ]);
    }
}
