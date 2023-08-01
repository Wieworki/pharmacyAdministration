<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectHome = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin () {
        return view('auth.login');
      }

    public function login(Request $request)
    {
        try {
            $check_password = null;
            $usuario = User::where('email', $request->email)->first();
            if ($usuario) {
                $check_password = Hash::check($request->password, $usuario->password);
            }

            if ($check_password) {
                return redirect()->intended($this->redirectHome);
            } else {
                return redirect()->back();
            }

        } catch (\Throwable $msg) {
            Log::debug('There was a problem trying to login: ' . $msg);
            return view('auth/login');
        }
    }
}