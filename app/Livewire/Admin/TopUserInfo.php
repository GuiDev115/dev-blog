<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class TopUserInfo extends Component
{
    public function render()
    {
        return view('livewire.admin.top-user-info', [
            'user'=>User::findOrFail(auth()->id())
        ]);

    }
}
