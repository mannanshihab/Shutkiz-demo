<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Privacy-Policy - Shutkiz')]

class PrivacyPolicyPage extends Component
{
    public function render()
    {
        return view('livewire.privacy-policy-page');
    }
}
