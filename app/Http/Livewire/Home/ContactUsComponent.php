<?php

namespace App\Http\Livewire\Home;

use App\Models\ContactUs;
use Livewire\Component;

class ContactUsComponent extends Component
{    
    public $username;
    public $email;
    public $message;

    protected $rules = [
        'username' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|max:200'
    ];

    public function submitContact()
    {
        $this->validate();

        ContactUs::create([
            'username' => $this->username,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        $this->username = '';
        $this->email = '';
        $this->message = '';

        $this->emit('alert', ['type' => 'success', 'message' => 'Contact Us Form Submitted Successfully.']);
    }

    public function render()
    {
        return view('livewire.home.contact-us-component')->layout('layouts.base');
    }
}
