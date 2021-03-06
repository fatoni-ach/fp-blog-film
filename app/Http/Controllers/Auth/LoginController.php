<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{User, Profil};
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login_user(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))){
            return redirect(route('homepage'));
        }
        return redirect(route('login'));
    }
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|string|email|max:45|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $profil = Profil::create([
            'nama' => $user->name,
            'tgl_lahir' => "1999-01-01",
            'user_id'   => $user->id,
        ]);
        $request->session()->flash('sukses_create_login', 'User berhasil dibuat silahkan login dan update profil');
        return redirect(route('login'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
