<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Recipe - Shutkiz')]
class Recipes extends Component
{
    use WithPagination;
    public function render()
    {
        $recipes  = Recipe::select('name', 'youtubeLink')->where('is_active', 1)->Paginate(12);
        return view('livewire.recipes',[
            'recipes' => $recipes
        ]);
    }
}
