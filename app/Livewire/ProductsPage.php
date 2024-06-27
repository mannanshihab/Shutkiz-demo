<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Product;
use App\Models\ProductPriceRange;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Products - Shutkiz')]

class ProductsPage extends Component
{
    use WithPagination;

    #[Url]
    public $featured_product;

    #[Url]
    public $on_sale;

    #[Url]
    public $price_range= 1500;

    #[Url]
    public $sort;


    #add to cart
    public function addToCart($product_id){
        
        $total_count = CartManagement::addItemToCart($product_id);
        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);
    }

    public function render()
    {
        
        $products = Product::query()->with('ProductPrice')->where('is_active', 1)->Paginate(9);
        
        //Filter is_featured
        if($this->featured_product){
            Product::where('is_featured', 1);
        }

        //Filter is_featured
        if($this->on_sale){
            Product::where('on_sale', 1);
        }

        //Price Filter
        if($this->price_range){
            ProductPriceRange::whereBetween('price', ['200', $this->price_range]);
        }

        //Sort
        if($this->sort == 'latest'){
            Product::latest();
        }
        if($this->sort == 'price'){
            ProductPriceRange::orderBy('price');
        }

        return view('livewire.products-page',[
            'products' => $products
        ]);
    }
}
