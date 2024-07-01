<?php

namespace App\Livewire;


use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Returns-Policy - Shutkiz')]

class ReturnsPage extends Component
{
    public function render()
    {
        return view('livewire.returns-page');
    }
}
