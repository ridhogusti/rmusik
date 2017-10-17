<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     public function login(Request $request)
        {
            $body = $request->only('email','password');

            $user = User::where('email',$request->email)->first();
            $attempt = Auth::attempt($body);

            if ($attempt) {
                switch ($user->akses) {
                    case 'admin':
                        return redirect('admin/users');
                        break;
                    case 'member':
                        return redirect('/');
                    default:
                        return redirect('/home');
                        break;
                }
            }
            else{
                return 'anda tidak terdaftar di aplikasi ini!, silahkan hubungi admin';
            }
        }

    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
