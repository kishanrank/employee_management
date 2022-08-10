@extends('layouts.admin.default')

@section('title')
    {{ config('app.name') }} Dashboard
@endsection

@section('content')
    <div class="flex flex-row w-full">
        <div class="grid flex-grow card">
            <div class="hero min-h-screen bg-base-200">
                <div class="hero-content text-center">
                    <div class="">
                        <h1 class="text-5xl font-bold">Hello there, <b>{{ Auth::user()->name }}</b></h1>
                        <p class="py-6">Welcome to admin portal of {{ config('app.name') }}</p>
                        <h1 class="text-3xl mb-4 font-bold">Employee Statistics</b></h1>
                        <div class="grid grid-rows-4 grid-flow-col gap-4">
                            <div class="mb-4">
                                <h3><b>Highest salary by department</b></h3>
                                <table class="table table-compact w-full">
                                    <thead>
                                        <tr class="bg-gray-100">
                                            <th class="px-4 py-2">Department</th>
                                            <th class="px-4 py-2 ">Name</th>
                                            <th class="px-4 py-2">Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($highestSalByDept && count($highestSalByDept))
                                            @foreach ($highestSalByDept as $highestSal)
                                                <tr>
                                                    <td>{{ $highestSal['dname'] }}</td>
                                                    <td>{{ $highestSal['name'] }}</td>
                                                    <td>{{ $highestSal['salary'] }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3">No data found.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="mb-4">
                                <h3><b>Salary Range wise Employee count</b></h3>
                                <table class="table table-compact w-full">
                                    <thead>
                                        <tr class="bg-gray-100">
                                            <th class="px-4 py-2">Range</th>
                                            <th class="px-4 py-2">Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($salaryRange && count($salaryRange))
                                            @foreach ($salaryRange as $salaryRangeData)
                                                <tr>
                                                    <td>₹ {{ isset($ranges[$salaryRangeData['salary_range']]) ? $ranges[$salaryRangeData['salary_range']] : "" }}</td>
                                                    <td>{{ $salaryRangeData['emp_count'] }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3">No data found.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="mb-4">
                                <h3><b>Youngest Employee by Department</b></h3>
                                <table class="table table-compact w-full">
                                    <thead>
                                        <tr class="bg-gray-100">
                                            <th class="px-4 py-2">Department</th>
                                            <th class="px-4 py-2">Name</th>
                                            <th class="px-4 py-2">Age</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($youngestEmp && count($youngestEmp))
                                            @foreach ($youngestEmp as $youngestEmpData)
                                                <tr>
                                                    <td>{{ $youngestEmpData['dname'] }}</td>
                                                    <td>{{ $youngestEmpData['name'] }}</td>
                                                    <td>{{ date_diff(date_create($youngestEmpData['dob']), date_create('today'))->y }} Years
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3">No data found.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
