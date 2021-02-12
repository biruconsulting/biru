<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUserComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $Search;

    protected $listeners = ['DeleteUser', 'MakeAdmin'];


    public function MakeNormalUser($user_id) {
        if($user_id){
            $user = User::where('id', $user_id);
            $user->update([
                'user_type'=>'USR'
            ]);
        }
    }

    public function makeAdminConfirmation($user_id)
    { 
        $this->emit("swal:confirm", [
            'icon'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "This may occur the security issues",
            'confirmText' => 'Yes, Make as an Admin!',
            'method'      => 'MakeAdmin',
            'params'      => [$user_id], 
            'callback'    => '', 
        ]);
    }

    public function MakeAdmin($user_id) {
        if($user_id){
            $user = User::where('id', $user_id);
            $user->update([
                'user_type'=>'ADM'
            ]);
        }
    }


    public function userDeleteConfirmation($user_id)
    { 
        $this->emit("swal:confirm", [
            'icon'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, Delete!',
            'method'      => 'DeleteUser',
            'params'      => [$user_id], 
            'callback'    => '', 
        ]);
    }

    public function DeleteUser($user_id) {
        if($user_id){
            $user = User::where('id', $user_id);
            $user->delete();

            $this->emit('alert', ['type' => 'success', 'message' => 'User Deleted Successfully.']);
        }
    }

    public function render()
    {
        $searchTerm = '%'.$this->Search.'%';

        $users = User::where('id', 'LIKE', $searchTerm)
            ->orWhere('name', 'LIKE', $searchTerm)
            ->orWhere('email', 'LIKE', $searchTerm)
            ->paginate(10);

        return view('livewire.admin.admin-user-component', ['users' => $users])->layout('layouts.admin');
    }
}
