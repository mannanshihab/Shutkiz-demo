<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Blog Details - Shutkiz')]

class BlogDetailsPage extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }
    
    public function render()
    {
        return view('livewire.blog-details-page',[
            'blog' => Blog::where('slug', $this->slug)->firstOrFail(),
        ]);
    }
}
