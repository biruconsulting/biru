<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminGeneralCategoryComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $Search;

    public $name;

    protected $listeners = ['DeleteCategory'];

    protected $rules = [
        'name' => 'required|max:20'
    ];

    public function addCategory() {
        $this->validate();

        Category::create([
            'name'=>$this->name,
            'ad_type'=>'general',
        ]);

        $this->name = '';

        $this->emit('addCategory');

        $this->emit('alert', ['type' => 'success', 'message' => 'Category Created Successfully.']);

    }

    public function categoryDeleteConfirmation($category_id)
    { 
        $this->emit("swal:confirm", [
            'icon'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, Delete!',
            'method'      => 'DeleteCategory',
            'params'      => [$category_id], 
            'callback'    => '', 
        ]);
    }

    public function DeleteCategory($category_id) {
        if($category_id){
            $category = Category::where('id', $category_id)->first();
            $category->delete();

            $this->emit('alert', ['type' => 'success', 'message' => 'Category Deleted Successfully.']);
        }
    }

    public function render()
    {
        $searchTerm = '%'.$this->Search.'%';

        $general_categories = Category::where('ad_type', 'general')
                ->where('name', 'LIKE', $searchTerm)
                ->paginate(10);

        return view('livewire.admin.category.admin-general-category-component', ['general_categories'=>$general_categories])->layout('layouts.admin');
    }
}
