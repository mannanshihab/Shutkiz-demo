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
        
        $productQuery = Product::query()->with('ProductPrice')->where('is_active', 1)->orderByDesc('created_at');
        
        #Filter is_featured
        if($this->featured_product){
            $productQuery->where('is_featured', 1);
        }

        #Filter on_sale
        if($this->on_sale){
            $productQuery->where('on_sale', 1);
        }

        //Price Filter
        if($this->price_range){
            //$productQuery->ProductPrice->whereBetween('price', ['200', $this->price_range]);
        }

        //Sort
        if($this->sort == 'latest'){
            $productQuery->latest();
        }
        if($this->sort == 'price'){
            //$productQuery->ProductPrice->orderBy('price');
        }

        return view('livewire.products-page',[
            'products' => $productQuery->Paginate(9)
        ]);
    }
}
