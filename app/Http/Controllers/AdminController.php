<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;
use SawaStacks\Utils\Kropify;
use App\Models\GeneralSetting;

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

    public function generalSettings(Request $request)
    {
        $data = [
            'pageTitle' => 'Configurações Gerais',
        ];
        return view('back.pages.general_settings', $data);
    }

    public function updateLogo(Request $request)
    {
        $settings = GeneralSetting::take(1)->first();

        if (!is_null($settings)) {
            $path = 'images/site/';
            $old_logo = $settings->site_logo;
            $file = $request->file('site_logo');
            $filename = 'logo_'.uniqid().'.png';

            if ($request->hasFile('site_logo')) {
                $upload = $file->move(public_path($path), $filename);
                if ($upload) {
                    if ($old_logo != null && File::exists(public_path($path.$old_logo))) {
                        File::delete(public_path($path.$old_logo));
                    }
                    $settings->update(['site_logo' => $filename]);
                    return response()->json([
                        'status' => 1,
                        'image_path' => $path.$filename,
                        'message' => 'Logo atualizado com sucesso',
                    ])->header('Content-Type', 'application/json');
                } else {
                    return response()->json([
                        'status' => 0,
                        'message' => 'Alguma coisa deu errado ao atualizar o logo',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Erro ao atualizar o logo',
                ]);
            }
        }
    }

    public function updateFavicon(Request $request){
        $settings = GeneralSetting::take(1)->first();

        if(!is_null($settings)){
            $path = 'images/site/';
            $old_favicon = $settings->site_favicon;
            $file = $request->file('site_favicon');
            $filename = 'favicon_'.uniqid().'.png';

            if($request->hasFile('site_favicon')){
                $upload = $file->move(public_path($path), $filename);
                if($upload){
                    if($old_favicon != null && File::exists(public_path($path.$old_favicon))){
                        File::delete(public_path($path.$old_favicon));
                    }
                    $settings->update(['site_favicon' => $filename]);
                    return response()->json([
                        'status' => 1,
                        'message' => 'Favicon atualizado com sucesso', 'image_path' => $path.$filename,
                    ]);
                }else{
                    return response()->json([
                        'status' => 0,
                        'message' => 'Alguma coisa deu errado ao atualizar o favicon',
                    ]);
                }
            }else{
                return response()->json([
                    'status' => 0,
                    'message' => 'Erro ao atualizar o favicon',
                ]);
            }
        }
    }

}
