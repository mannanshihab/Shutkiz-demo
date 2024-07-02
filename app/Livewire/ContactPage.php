<?php

namespace App\Livewire;

use App\Models\contact;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Contact-Us - Shutkiz')]

class ContactPage extends Component
{
    public $first_name;
    public $last_name;
    public $phone_number;
    public $email;
    public $details;

    public function send_msg(){
        $this->validate([
            'first_name'        => 'required',
            'last_name'         => 'required',
            'phone_number'      => 'required| min:11' ,
            'email'             => 'required',
            'details'           => 'required',
        ]);

        $contact_msg = new contact();
        $contact_msg -> first_name = $this->first_name;
        $contact_msg -> last_name = $this->last_name;
        $contact_msg -> phone_number = $this->phone_number;
        $contact_msg -> email = $this->email;
        $contact_msg -> details = $this->details;

        $contact_msg->save();
        session()->flash('success', 'Msg Send Succesfully');
        return redirect("/contact");

    }
    public function render()
    {
        return view('livewire.contact-page');
    }
}
