<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Model\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller {

    public function __construct() {
        $this->middleware('guest.admin', ['except' => 'getLogout' ]);
    }

    public function getLogin() {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request) {

        $v = validator($request->all(), [
            $this->username() => 'required|email',
            'password' => 'required|min:8',
        ], [
            $this->username() . '.required' => 'Please enter your email address',
            $this->username() . '.email' => 'This email is invalid',
            'password.required' => 'Please enter your password',
            'password.min' => 'Password should be at least 8 characters',
        ]);

        if ($v->fails()) {
            return \response()->json(['status' => 'error', 'data' => $v->errors()->first()], 500);
        }

        $credentials = $request->only($this->username(), 'password');
        $authSuccess = admin()->attempt($credentials, $request->has('remember'));

        if ($authSuccess) {
            $request->session()->regenerate();
            return response(['success' => true], 200);
        }

        return
            response([
                'data' => 'Email or password isn\'t valid'
            ], 500);
    }

    /**
     * Logout The user
     */
    public function getLogout() {
        admin()->logout();
        return redirect('/admin/login');
    }

    protected function username()
    {
        return 'email';
    }

}
