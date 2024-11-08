<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;

class Profile extends Component
{
    public $tab = null;
    public $tabname = 'personal_details';
    protected $queryString = ['tab'=>['keep'=>'true']];

    public $name, $email, $username, $bio;

    public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount()
    {
        $this->tab = Request('tab') ? Request('tab') : $this->tabname;

        $user = User::findOrFail(auth()->id());
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->bio = $user->bio;
    }

    public function updatePersonalDetails()
    {
        $user = User::findOrFail(auth()->id());

        $this->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$user->id,
        ]);

        $user->name = $this->name;
        $user->username = $this->username;
        $user->bio = $this->bio;
        $updated = $user->save();

        sleep(0.5);

        if($updated){
            session()->flash('success', 'Profile updated successfully');
            $this->dispatch('profile-updated', ['type' => 'success', 'message' => 'Profile updated successfully']);
            $this->dispatch('UpdateTopUserInfo')->to(TopUserInfo::class);

        }else{
            session()->flash('error', 'Profile update failed');
            $this->dispatch('profile-updated', ['type' => 'error', 'message' => 'Profile update failed']);
        }
    }
    public function render()
    {
        return view('livewire.admin.profile',  [
            'user'=>User::findOrFail(auth()->id())
        ]);
    }
}
