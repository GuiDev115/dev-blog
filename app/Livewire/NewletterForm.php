<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NewsletterSubscriber;

class NewletterForm extends Component
{
    public $email = '';

    protected $rules = [
        'email' => 'required|email|unique:newsletter_subscribers,email',
    ];

    protected function messages()
    {
        return [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already subscribed.',
        ];
    }

    public function subscribe()
    {
        $this->validate();

        NewsletterSubscriber::create(['email' => $this->email]);

        $this->email = '';
        session()->flash('success', 'You have successfully subscribed to our newsletter!');
    }

    public function updated()
    {
        $this->validateOnly('email');
    }

    public function render()
    {
        return view('livewire.newletter-form');
    }
}
