<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\UserStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Helpers\CMail;
use Illuminate\Validation\Validator;

class AuthController extends Controller
{
    public function loginForm(Request $request)
    {
        $data =[
            'pageTitle' => 'Login'
        ];
        return view('back.pages.auth.login', $data);
    }

    public function forgotForm(Request $request)
    {
        $data =[
            'pageTitle' => 'Forgot Password'
        ];
        return view('back.pages.auth.forgot', $data);
    }

    public function loginHandler(Request $request)
    {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if( $fieldType == 'email' ){
            $request->validate([
                'login_id' => 'required|email|exists:users,email',
                'password' => 'required|min:5'
            ],[
                'login_id.required' => 'Entre com seu email ou username',
                'login_id.email' => 'Email inválido',
                'login_id.exists' => 'Email não cadastrado'
            ]);
        }else{
            $request->validate([
                'login_id' => 'required|exists:users,username',
                'password' => 'required|min:5'
            ],[
                'login_id.required' => 'Entre com seu email ou username',
                'login_id.exists' => 'Username não cadastrado'
            ]);
        }
        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password,
        );
        if( Auth::attempt($creds) ){
            if(auth()->user()->status == UserStatus::Inactive){
                Auth::validate();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('admin.login')->withInput()->with('fail', 'Sua conta está inativa, TU FOI BANIDO');
            }
            if(auth()->user()->status == UserStatus::Pending){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('admin.login')->withInput()->with('fail', 'Sua conta está pendente de aprovação');
            }

            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.login')->withInput()->with('fail', 'Credenciais inválidas');
        }
    }

    public function sendPasswordResetLink(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email'
        ],[
            'email.required' => 'O :attribute é requirido',
            'email.email' => 'Endereço de Email Invalido',
            'email.exists' => 'Email não cadastrado na plataforma'
        ]);

        $user = User::where('email', $request->email)->first();

        $token = base64_encode(Str::random(64));

        $oldToken = DB::table('password_reset_tokens')
                            ->where('email', $user->email)
                            ->first();
        if($oldToken) {
            DB::table('password_reset_tokens')
                ->where('email', $user->email)
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        }else{
            DB::table('password_reset_tokens')->insert([
                'email' => $user->email,
                'token' => $token,
                'created_at' => Carbon::now()
                ]);
        }

        $actionLink = route('admin.reset_password_form', ['token'=>$token]);

        $data = array (
            'actionlink' => $actionLink,
            'user' => $user
        );

        $mail_body = view('email-templates.forgot-template', $data)->render();

        $mailConfig = array(
            'recipient_address' => $user->email,
            'recipient_name' => $user->name,
            'subject' => 'Reset Password',
            'body' => $mail_body
        );

        if(CMail::send($mailConfig)){
            return redirect()->route('admin.forgot')->with('success', 'Link de redefinição de senha enviado para seu email');
        }else{
            return redirect()->route('admin.forgot')->with('fail', 'Falha ao enviar link de redefinição de senha');
        }
    }

    public function resetForm(Request $request, $token = null)
    {
        $isTokenExists = DB::table('password_reset_tokens')
                            ->where('token', $token)
                            ->first();
        if( !$isTokenExists){
            return redirect()->route('admin.forgot')->with('fail', 'Token inválido');
        }else{
            $data = [
                'pageTitle' => 'Reset Password',
                'token' => $token
            ];
            return view('back.pages.auth.reset', $data);
        }
    }

    public function resetPasswordHandler(Request $request){
        $request->validate([
           'new_password' => 'required|min:5|required_with:new_password_confirmation|same:new_password_confirmation',
            'new_password_confirmation' => 'required'
        ]);

        $dbToken = DB::table('password_reset_tokens')
                        ->where('token', $request->token)
                        ->first();

        $user = User::where('email', $dbToken->email)->first();

        User::where('email', $dbToken->email)
            ->update([
                'password' => Hash::make($request->new_password)
            ]);

        $data = array(
            'user' => $user,
            'new_password' => $request->new_password
        );

        $mail_body = view('email-templates.password-reset-template', $data)->render();

        $mailConfig = array(
            'recipient_address' => $user->email,
            'recipient_name' => $user->name,
            'subject' => 'Senha troca com sucesso',
            'body' => $mail_body
        );

        if( CMail::send($mailConfig)) {
            DB::table('password_reset_tokens')
                ->where('token', $request->token)
                ->delete();
            return redirect()->route('admin.login')->with('success', 'Senha trocada com sucesso');
        }else{
            return redirect()->route('admin.reset_password_form', ['token'=>$dbToken->token])->with('fail', 'Falha ao trocar senha');
        }
    }
}
