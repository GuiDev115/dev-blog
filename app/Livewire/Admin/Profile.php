<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Helpers\CMail;
use App\Models\UserSocialLink;

class Profile extends Component
{
    public $tab = null;
    public $tabname = 'personal_details';
    protected $queryString = ['tab'=>['keep'=>'true']];

    public $name, $email, $username, $bio;

    public $current_password, $new_password, $new_password_confirmation;

    public $facebook_url, $instagram_url, $youtube_url, $linkedin_url, $twitter_url, $github_url;

    protected $listeners = [
        'updateProfile' => '$refresh'
    ];

    public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount()
    {
        $this->tab = Request('tab') ? Request('tab') : $this->tabname;

        $user = User::with('social_links')->findOrFail(auth()->id());
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->bio = $user->bio;

        // Set social links
        if(!is_null($user->social_links)){
            $this->facebook_url = $user->social_links->facebook_url;
            $this->instagram_url = $user->social_links->instagram_url;
            $this->youtube_url = $user->social_links->youtube_url;
            $this->linkedin_url = $user->social_links->linkedin_url;
            $this->twitter_url = $user->social_links->twitter_url;
            $this->github_url = $user->social_links->github_url;
        }
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

        $this->dispatch('showToastr', [
            'type' => $updated ? 'success' : 'error',
            'message' => $updated ? 'Perfil atualizado com sucesso' : 'Erro ao atualizar perfil'
        ]);
    }

    public function updatePassword()
    {
        $user = User::findOrFail(auth()->id());

        $this->validate([
            'current_password' => [
                'required',
                'min:5',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        return $fail('Senha atual incorreta');
                    }
                }
            ],
            'new_password' => 'required|confirmed|min:5',
        ]);

        $updated = $user->update([
            'password' => Hash::make($this->new_password)
        ]);

        if ($updated) {
            $data = array(
                'user'=>$user,
                'new_password'=>$this->new_password
            );

            $mail_body = view('email-templates.password-reset-template', $data)->render();

            $mail_config = array(
                'recipient_address' => $user->email,
                'recipient_name' => $user->name,
                'subject' => 'Sua senha foi alterada',
                'body' => $mail_body
            );

            CMail::send($mail_config);

            auth()->logout();
            Session::flash('info', 'Sua senha foi alterada com sucesso. Faça login com sua nova senha.');
            $this->redirectRoute('admin.login');
        } else {
           $this->dispatch('showToastr', [
                'type' => 'error',
                'message' => 'Erro ao atualizar senha'
            ]);
        }
    }

    public function updateSocialLinks()
    {
        $user = User::findOrFail(auth()->id());

        $this->validate([
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'github_url' => 'nullable|url',
        ]);

        $data = [
            'facebook_url' => $this->facebook_url,
            'instagram_url' => $this->instagram_url,
            'youtube_url' => $this->youtube_url,
            'linkedin_url' => $this->linkedin_url,
            'twitter_url' => $this->twitter_url,
            'github_url' => $this->github_url,
        ];

        if ($user->social_links) {
            $updated = $user->social_links->update($data);
        } else {
            $data['user_id'] = $user->id;
            $created = UserSocialLink::create($data);
            $updated = $created ? true : false;
        }

        $this->dispatch('showToastr', [
            'type' => $updated ? 'success' : 'error',
            'message' => $updated ? 'Links sociais atualizados com sucesso' : 'Erro ao atualizar links sociais'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.profile',  [
            'user'=>User::findOrFail(auth()->id())
        ]);
    }
}
