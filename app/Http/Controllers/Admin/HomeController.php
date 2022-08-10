<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $ranges = Employee::getSalaryRanges();
        $highestSalByDept = $youngestEmp = $salaryRange = [];
        try {
            $employee = new Employee();
            $highestSalByDept = $employee->getHighestSalByDept();
            $youngestEmp = $employee->getYoungestEmp();
            $salaryRange = $employee->getCountByRange();
             return view('admin.dashboard', compact('highestSalByDept', 'youngestEmp', 'salaryRange', 'ranges'));
        } catch (\Throwable $th) {
            return view('admin.dashboard', compact('highestSalByDept', 'youngestEmp', 'salaryRange', 'ranges'));
        }
    }
}
