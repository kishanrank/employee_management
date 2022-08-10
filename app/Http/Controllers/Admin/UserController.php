<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function index()
    {
        try {
            return view('admin.users');
        } catch (\Throwable $th) {
            return redirect(route('admin.dashboard'));
        }
    }
}
