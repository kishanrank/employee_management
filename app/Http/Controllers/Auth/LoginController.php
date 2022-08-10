<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use ThrottlesLogins;
    use AuthenticatesUsers;

    public $maxAttempts = 5;

    public $decayMinutes = 3;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validator($request);

        //check if the user has too many login attempts.
        if ($this->hasTooManyLoginAttempts($request)) {
            //Fire the lockout event
            $this->fireLockoutEvent($request);

            //redirect the user back after lockout.
            return $this->sendLockoutResponse($request);
        }

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return $this->authenticated($request, Auth::user());
        }

        $this->incrementLoginAttempts($request);

        return $this->loginFailed();
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user && $user->role == User::ROLE_ADMIN) {
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->intended(route('home'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()
            ->route('login')
            ->with('success', 'User has been logged out!');
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:users|min:5|max:191',
            'password' => 'required|string|min:4|max:255',

        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules, $messages);
    }

    private function loginFailed()
    {
        $notification = array(
            'message' => 'Password Mismatch, please check credentials and try again!',
            'alert-type' => 'error'
        );
        return redirect()
            ->back()
            ->withInput()
            ->with($notification);
    }

    public function username()
    {
        return 'email';
    }
}
