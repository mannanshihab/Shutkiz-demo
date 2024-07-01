<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
#[Title('Product Details - Shutkiz')]
class ProductDetailPage extends Component
{
    public $slug;

    #[Validate('required', message: 'Please Select One')]
    public $priceRange_id;
    
    public $quantity =  1;

    public function priceRange(){
        $this->validate();
        $this->priceRange_id;
    }
    public function increaseQty(){
        $this->quantity++;
    }
    public function decreaseQty(){
        if($this->quantity > 1){
            $this->quantity--;
        }
    }
    #add to cart
    public function addToCart($product_id){
        $this->validate([
            'priceRange_id'        => 'required',
        ]);
        $total_count = CartManagement::addItemToCartWithQty($product_id, $this->priceRange_id, $this->quantity);
        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);
    }
    public function render()
    {   
        return view('livewire.product-detail-page',[
            'product' => Product::with('ProductPrice')->where('slug', $this->slug)->firstOrFail(),
        ]);
    }
}
