<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use App\Models\Employee;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Employees extends Component
{
    use WithFileUploads, WithPagination;
    public $employee, $departments, $statuses, $photo, $empId = 0;
    public $isOpen = 0;

    protected $rules = [
        'employee.department_id' => 'required|integer',
        'employee.name' => 'required|string|min:1|max:255',
        'employee.email' => 'required|email|max:255',
        'employee.phone' => 'required|min:10|max:10',
        'employee.dob' => 'required|date',
        'photo' =>  'required_if:empId,==,0',
        'employee.salary' => 'required',
        'employee.status' => 'required|boolean'
    ];

    protected $messages = [
        'employee.department_id.required' => 'Please select department',
        'employee.name.required' => 'Name field is required',
        'employee.email.required' => 'Email field is required',
        'employee.phone.required' => 'Phone field is required',
        'employee.dob.required' => 'DOB field is required',
        'photo.required_if' => 'Photo field is required',
        'employee.salary.required' => 'Salary field is required',
        'employee.status.required' => 'Status field is required',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $this->employee = Employee::find($id);
            $this->empId = $id;
        } else {
            $this->employee = new Employee();
        }
        $this->departments = Department::where('status', 1)->get();
        $this->statuses = Employee::getStatusOptions();
    }

    public function render()
    {
        $employees = Employee::join('departments', 'departments.id', '=', 'employees.department_id')
                        ->select('employees.*', 'departments.name as d_name')
                        ->where('employees.status', 1)
                        ->paginate(10);
        return view('livewire.admin.employees', ['employees' => $employees]);
    }

    /**
     * open popup modal for creating employee
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * open popup modal
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * close popup modal
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetValidation();
    }

    /**
     * reset form input fields
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->reset(['employee', 'empId', 'photo']);
    }

    /**
     * store employee data
     *
     * @var array
     */
    public function store()
    {
        $this->validate();
        if ($this->photo) {
            $this->employee['photo'] = $this->photo->store('employee', 'public');
        }

        if ($this->empId) {
            $this->employee->save();
        } else {
            Employee::create($this->employee);
        }

        session()->flash(
            'message',
            $this->empId ? 'Employee Updated Successfully.' : 'Employee Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    /**
     * display edit modal popup
     *
     * @var array
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $this->empId = $id;
        $this->employee = $employee;

        $this->openModal();
    }

    /**
     * delete employees from list
     *
     * @var array
     */
    public function delete($id)
    {
        Employee::find($id)->delete();
        session()->flash('message', 'Employee Deleted Successfully.');
    }
}
