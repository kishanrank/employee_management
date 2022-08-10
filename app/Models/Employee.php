<?php

namespace App\Models;

use App\Models\Traits\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory, Status;

    public $table = 'employees';

    protected $fillable = ['department_id', 'name', 'dob', 'phone', 'photo', 'email', 'salary', 'status'];

    public static function getSalaryRanges()
    {
        return [
            'type1' => "0 - 50000",
            'type2' => "50001 - 100000",
            'type3' => "100001+"
        ];
    }

    public function getYoungestEmp()
    {
        return self::select('employees.name', 'employees.dob', 'departments.name as dname')
            ->joinSub(
                self::select('department_id', DB::raw('MAX(DOB) AS min_dob'))->groupBy('department_id'),
                'youngest_emp',
                function ($join) {
                    $join->on('youngest_emp.department_id', '=', 'employees.department_id')
                        ->on('youngest_emp.min_dob', '=', 'employees.dob');
                }
            )
            ->where('employees.status', 1)
            ->leftJoin('departments', 'departments.id', '=', 'employees.department_id')
            ->get()
            ->toArray();
    }

    public function getCountByRange()
    {
        $lowSqlCase = "employees.salary <= 50000";
        $mediumSqlCase = "employees.salary >= 50001 AND employees.salary <= 100000";
        $highSqlCase = "employees.salary >= 100001";
        return self::select(
            DB::raw("(CASE
                WHEN $lowSqlCase THEN 'type1'
                WHEN $mediumSqlCase  THEN 'type2'
                WHEN $highSqlCase THEN 'type3'
                END
            ) AS salary_range"),
            DB::raw("(IF($lowSqlCase, COUNT(employees.id), IF($mediumSqlCase, COUNT(employees.id), IF($highSqlCase, COUNT(employees.id), '-')))) AS emp_count")
        )
            ->where('employees.status', 1)
            ->groupBy('salary_range')
            ->get()
            ->toArray();
    }

    public function getHighestSalByDept()
    {
        return self::select('employees.name', 'employees.salary', 'departments.name as dname')
            ->joinSub(
                self::select('department_id', DB::raw('MAX(salary) AS msalary'))->groupBy('department_id'),
                'max_salary',
                function ($join) {
                    $join->on('max_salary.department_id', '=', 'employees.department_id')
                        ->on('max_salary.msalary', '=', 'employees.salary');
                }
            )
            ->leftJoin('departments', 'departments.id', '=', 'employees.department_id')
            ->where('employees.status', 1)
            ->get()
            ->toArray();
    }
}
