<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.admin.profile',  [
            'user'=>User::findOrFail(auth()->id())
        ]);
    }
}
