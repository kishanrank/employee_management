<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

class DepartmentController extends Controller
{
    public function index()
    {
        try {
            return view('admin.departments');
        } catch (\Throwable $th) {
            return redirect(route('admin.dashboard'));
        }
    }
}
