<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    public $name, $email, $password, $userId;
    public $isOpen, $isFavoriteOpen = 0;

    public function render()
    {
        $users = User::paginate(5);
        return view('livewire.admin.users', ['users' => $users]);
    }

    /**
     * open popup modal for creating user
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
     * close favorite popup modal
     *
     * @var array
     */
    public function closeFavoriteModal()
    {
        $this->isFavoriteOpen = 0;
    }

    /**
     * open favorite popup modal
     *
     * @var array
     */
    public function openFavoriteModal()
    {
        $this->isFavoriteOpen = 1;
    }

    /**
     * reset form input fields
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    /**
     * store user data
     *
     * @var array
     */
    public function store()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ];

        if ($this->userId) {
            $rules['email'] = 'required|' . Rule::unique('users', 'email')->ignore($this->userId);
        }
        $this->validate($rules);

        User::updateOrCreate(['id' => $this->userId], [
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => User::ROLE_USER
        ]);

        session()->flash(
            'message',
            $this->userId ? 'User Updated Successfully.' : 'User Created Successfully.'
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
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        // $this->password = $user->password;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }
}
