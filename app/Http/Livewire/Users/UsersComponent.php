<?php

namespace App\Http\Livewire\Users;

use App\Models\AppointmentModule\Gender;
use App\Models\AppointmentModule\TypeDocuments;
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
        $lastname,
        $email,
        $photo,
        $image,
        $password,
        $userId,
        $genderId,
        $typeDocumentId,
        $identification,
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
        $genders = Gender::where("active", 1)->get();
        $typesDocuments = TypeDocuments::where("active",1)->get();
        $users = User::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(15);
        return view('livewire.users.users-component', [
            'users' => $users,
            'genders' => $genders,
            "typesDocuments" => $typesDocuments,
        ])->extends('layouts.app')->section('content');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|max:30',
            'lastname' => 'required|max:30',
            'email' => 'required|unique:users|email',
            'roleId' => 'required',
            'password' => 'required|min:5',
            'identification' => 'required|max:12',
            'typeDocumentId' => 'required'

        ], [], [
            'name' => 'nombre',
            'lastname' => 'apellidos',
            'email' => 'correo',
            'roleId' => 'perfil',
            'genderId' => 'género',            
            'password' => 'contraseña',
            'identification' => 'identificación',
            'typeDocumentId' => 'tipo de documento'
        ]);

        $user = new User();
        $user->name = $this->name;
        $user->lastname = $this->lastname;
        $user->type_document = $this->typeDocumentId;
        $user->identification = $this->identification;
        $user->email = $this->email;
        $user->gender_id = $this->genderId;
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
            $this->genderId = $user->gender_id;
            $this->name = $user->name;
            $this->lastname = $user->lastname;
            $this->typeDocumentId = $user->type_document;
            $this->identification = $user->identification;
            $this->email = $user->email;
            $this->image = $user->image;
            $this->roleId = $user->roles->first()->id;
               
        }
       
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|max:30',
            'lastname' => 'required|max:30',
            'email' => 'required|unique:users,email,' . $this->userId,
            'roleId' => 'required',
            'password' => 'min:5',
            'identification' => 'required|max:12',
            'typeDocumentId' => 'required'

        ], [], [
            'name' => 'nombre',
            'lastname' => 'apellidos',
            'email' => 'correo',
            'roleId' => 'perfil',
            'genderId' => 'género',
            'password' => 'contraseña',
            'identification' => 'identificación',
            'typeDocumentId' => 'tipo de documento'
        ]);

        $user = User::find($this->userId);
        $user->name = $this->name;
        $user->lastname = $this->lastname;
        $user->type_document = $this->typeDocumentId;
        $user->identification = $this->identification;
        $user->email = $this->email;
        $user->gender_id = $this->genderId;
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
        $this->lastname = '';
        $this->typeDocumentId = '';
        $this->identification = '';
        $this->email = '';
        $this->password = '';
        $this->photo = '';
        $this->userId = '';
        $this->genderId = '';
        
    }

    public function cancel()
    {

        $this->resetInputFields();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emit('close-modal');
    }
}