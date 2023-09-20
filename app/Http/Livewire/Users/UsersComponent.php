<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UsersComponent extends Component
{
    use WithFileUploads;
    public $search;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public
        $name,
        $email,
        $photo,
        $image,
        $password,
        $userId,
        $roles,
        $roleId,
        $profile;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $this->roles = Role::all();
        $users = User::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(15);
        return view('livewire.users.users-component', [
            'users' => $users
        ])->extends('layouts.app')->section('content');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|max:30',
            'email' => 'required|unique:users|email',
            'roleId' => 'required',
            'password' => 'required|min:5'

        ], [], [
            'name' => 'nombre',
            'email' => 'correo',
            'roleId' => 'perfil',            
            'password' => 'contraseña'
        ]);

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;

        $role = Role::find($this->roleId);
        $user->assignRole($role->name);

        $user->password = bcrypt($this->password);

        if (!empty($this->photo)) {
            $customAvatarName = uniqid() . '.' . $this->photo->extension();
            $this->photo->storeAs('public/users/', $customAvatarName);
            $user->image = 'users/' . $customAvatarName;
        }
        

        $user->save();

        $this->emit('close-modal');
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Usuario creado exitosamente']);
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $user = User::find($id);
        
        if ($user != '') {
            $this->userId = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->image = $user->image;
            $this->roleId = $user->roles->first()->id;
               
        }
       
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|max:30',
            'email' => 'required|unique:users,email,' . $this->userId,
            'roleId' => 'required',
            'password' => 'min:5'

        ], [], [
            'name' => 'nombre',
            'email' => 'correo',
            'roleId' => 'perfil',
            'password' => 'contraseña'
        ]);

        $user = User::find($this->userId);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->syncRoles([]);
        
        $role = Role::find($this->roleId);
        $user->assignRole($role->name);
        
        if (!empty($this->photo)) {

            $tmpImg = $user->image;
            if ($tmpImg != null && file_exists('storage/users/' . $tmpImg)) {
                unlink('storage/users/' . $tmpImg);
            }

            $customAvatarName = uniqid() . '.' . $this->photo->extension();
            $this->photo->storeAs('public/users/', $customAvatarName);
            $user->image = 'users/' . $customAvatarName;
        }

        if ($this->password != '') {
            $user->password = bcrypt($this->password);
        }

        $user->update();
        $this->emit('close-modal');
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Usuario actualizado exitosamente']);
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $this->userId = $id;
    }

    public function destroy()
    {
        $user = User::find($this->userId);
        $user->delete();
        $this->emit('alert', ['type' => 'success', 'message' => 'Usuario eliminado exitosamente.']);
        $this->cancel();
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->photo = '';
        $this->userId = '';
        
    }

    public function cancel()
    {

        $this->resetInputFields();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emit('close-modal');
    }
}