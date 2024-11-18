<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;
use SawaStacks\Utils\Kropify;

class AdminController extends Controller
{
    public function adminDashboard(Request $request)
    {
        $data =[
            'pageTitle' => 'Dashboard'
        ];
        return view('back.pages.dashboard', $data);
    }

    public function logoutHandler(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('fail', 'Você saiu da sua conta');
    }

    public function profileView(Request $request)
    {
        $data = [
            'pageTitle' => 'Perfil',
        ];
        return view('back.pages.profile', $data);
    }

    public function updateProfilePicture(Request $request){
        $user = User::findOrFail(auth::id());
        $path = 'images/users/';
        $file = $request->file('profilePictureFile');
        $old_picture = $user->getAttributes()['picture'];
        $filename = 'IMG_'.uniqid().'.png';

        $upload = Kropify::getFile($file, $filename)->maxWoH(255)->save($path);

        if($upload){
            if($old_picture != null && File::exists(public_path($path.$old_picture))){
                File::delete(public_path($path.$old_picture));
            }

            $user->update(['picture' => $filename]);

            return response()->json([
                'status' => 1,
                'message' => 'Imagem de perfil atualizada com sucesso',
            ]);

        }else{
            return response()->json([
                'status' => 0,
                'message' => 'Erro ao atualizar a imagem de perfil',
            ]);
        }
    }

}
