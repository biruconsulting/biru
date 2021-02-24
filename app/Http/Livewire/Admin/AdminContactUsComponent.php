<?php

namespace App\Http\Livewire\Admin;

use App\Models\ContactUs;
use Livewire\Component;
use Livewire\WithPagination;

class AdminContactUsComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $Search;

    protected $listeners = ['DeleteUserContact'];

    public function userContactDeleteConfirmation($user_contact_id)
    { 
        $this->emit("swal:confirm", [
            'icon'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, Delete!',
            'method'      => 'DeleteUserContact',
            'params'      => [$user_contact_id], 
            'callback'    => '', 
        ]);
    }

    public function DeleteUserContact($user_contact_id) {
        if($user_contact_id){
            $user_contact = ContactUs::where('id', $user_contact_id)->first();
            $user_contact->delete();

            $this->emit('alert', ['type' => 'success', 'message' => 'User Contact Deleted Successfully.']);
        }
    }
    
    public function render()
    {
        $searchTerm = '%'.$this->Search.'%';

        $contact_submissions = ContactUs::where('username', 'LIKE', $searchTerm)
                ->paginate(10);

        return view('livewire.admin.admin-contact-us-component', ['contact_submissions'=>$contact_submissions])->layout('layouts.admin');
    }
}
