<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPriceRange;
use App\Models\Recipe;
use Livewire\Attributes\Title;
use Livewire\Component;

class HomePage extends Component
{
    #[Title('Home - Shutkiz')]

   
    public function render()
    {
        $carousels = Carousel::select('name', 'image')->where('is_active', 1)->limit(4)->get();
        $products = Product::with('ProductPrice')->where('is_active', 1)->limit(4)->get();
        $blogs    = Blog::select('name', 'slug', 'images', 'description' )->where('is_active', 1)->limit(4)->get();
        $recipes  = Recipe::select('name', 'youtubeLink')->where('is_active', 1)->limit(4)->get();
        //dd($blogs);
        return view('livewire.home-page',[
            'products' => $products,
            'blogs' => $blogs,
            'carousels' => $carousels,
            'recipes' => $recipes,
        ]);
    }
}
