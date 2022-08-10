<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function register(Request $request)
    {
        $this->validator($request);
        $user = $this->create($request->all());
        $notification = array(
            'message' => 'You have successfully registered, Please login now!',
            'alert-type' => 'success'
        );
        return redirect('/login')->with($notification);
    }

    protected function validator(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email'    => 'required|email|min:5|max:191|unique:users,email',
            'password' => 'required|string|confirmed|min:4|max:255',
        ];
        $request->validate($rules);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return $user;
    }
}
