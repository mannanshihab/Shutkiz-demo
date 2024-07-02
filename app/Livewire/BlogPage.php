<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Blogs - Shutkiz')]
class BlogPage extends Component
{
    use WithPagination;

    public function render()
    {
        $blogs    = Blog::select('name', 'slug', 'images', 'description' )->where('is_active', 1)->Paginate(8);
        return view('livewire.blog-page',[
            'blogs' => $blogs 
        ]);
    }
}
