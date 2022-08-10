<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class Departments extends Component
{
    use WithPagination;
    public $departmentId, $name, $status, $statuses;
    public $isOpen = 0;

    public function mount()
    {
        $this->statuses = Department::getStatusOptions();
    }

    public function render()
    {
        $departments = Department::where('departments.status', 1)->paginate(10);
        return view('livewire.admin.departments', ['departments' => $departments]);
    }

    /**
     * open popup modal for creating department
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
        $this->reset(['name', 'status']);
    }

    /**
     * store department data
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'name' => 'required|string|min:1|max:255',
            'status' => 'required|boolean',
        ]);

        Department::updateOrCreate(['id' => $this->departmentId], [
            'name' => $this->name,
            'status' => $this->status,
        ]);

        session()->flash(
            'message',
            $this->departmentId ? 'Department Updated Successfully.' : 'Department Created Successfully.'
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
        $department = Department::findOrFail($id);
        $this->departmentId = $id;
        $this->name = $department->name;
        $this->status = $department->status;
        $this->openModal();
    }

    /**
     * delete departments from list
     *
     * @var array
     */
    public function delete($id)
    {
        Department::find($id)->delete();
        session()->flash('message', 'Department Deleted Successfully.');
    }
}
