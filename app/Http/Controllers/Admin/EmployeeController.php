<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

class EmployeeController extends Controller
{
    public function index()
    {
        try {
            return view('admin.employees');
        } catch (\Throwable $th) {
            return redirect(route('admin.dashboard'));
        }
    }
}
