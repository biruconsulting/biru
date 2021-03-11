<?php

namespace App\Http\Livewire\Admin;

use App\Models\CarouselSlider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class AdminCarouselSlidersComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['DeleteCarouselSlider'];

    public function carouselSliderDeleteConfirmation($carousel_slider_id)
    { 
        $this->emit("swal:confirm", [
            'icon'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, Delete!',
            'method'      => 'DeleteCarouselSlider',
            'params'      => [$carousel_slider_id], 
            'callback'    => '', 
        ]);
    }

    public function DeleteCarouselSlider($carousel_slider_id) {
        if($carousel_slider_id){
            $carousel_slider = CarouselSlider::where('id', $carousel_slider_id)->first();
            
            $slider_image = $carousel_slider->image;

            if ($slider_image) {
                unlink('storage/' . $slider_image);
            }

            $carousel_slider->delete();

            $this->emit('alert', ['type' => 'success', 'message' => 'Carousel Slider Deleted Successfully.']);
        }
    }

    public $Search;

    public $carousel_title;
    public $carousel_image;
    public $carousel_link;
    public $carousel_description;

    public $edit_carousel_id;
    public $edit_carousel_title;
    public $existing_carousel_image;
    public $edit_carousel_image;
    public $edit_carousel_link;
    public $edit_carousel_description;

    public function editCarouselSlider($carousel_id) {
        $carousel_slider = CarouselSlider::where('id', $carousel_id)->first();

        $this->edit_carousel_id  = $carousel_slider->id;
        $this->edit_carousel_title  = $carousel_slider->title;
        $this->existing_carousel_image  = $carousel_slider->image;
        $this->edit_carousel_link  = $carousel_slider->link;
        $this->edit_carousel_description  = $carousel_slider->description;
    }

    public function updateCarouselSlider($carousel_id) {

        $carousel_slider = CarouselSlider::find($carousel_id);

        $new_carousel_image = $this->edit_carousel_image;

        if ($new_carousel_image) {

            $this->validate([
                'edit_carousel_title' => 'required|min:5',
                'edit_carousel_image' => 'required',
                'edit_carousel_link' => 'required',
                'edit_carousel_description' => 'required|min:100|max:300',
            ]);

            if ($this->existing_carousel_image) {
                Storage::disk('public')->delete($this->existing_carousel_image);
            }

            // for thumbnail image 
            // Get filename with extension
            $filenameWithExt_new_carousel_image = $new_carousel_image->getClientOriginalName();

            // Get file path
            $filename_new_carousel_image = pathinfo($filenameWithExt_new_carousel_image, PATHINFO_FILENAME);

            // Remove unwanted characters
            $filename_new_carousel_image = preg_replace("/[^A-Za-z0-9 ]/", '', $filename_new_carousel_image);
            $filename_new_carousel_image = preg_replace("/\s+/", '-', $filename_new_carousel_image);

            // Get the original image extension
            $extension_new_carousel_image = $new_carousel_image->getClientOriginalExtension();

            // Create unique file name
            $fileNameToStore_new_carousel_image = $filename_new_carousel_image . '_' . time() . '.' . $extension_new_carousel_image;

            $resize_new_carousel_image = Image::make($new_carousel_image)->resize(null, 512, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');

            Storage::put("public/images/carousel_slider/{$fileNameToStore_new_carousel_image}", $resize_new_carousel_image->__toString());

            $updated_carousel_image = 'images/carousel_slider/' . $fileNameToStore_new_carousel_image;

            $carousel_slider->update([
                'title' => $this->edit_carousel_title,
                'image' => $updated_carousel_image,
                'description' => $this->edit_carousel_description,
                'link' => $this->edit_carousel_link,
            ]);

            $this->emit('editCarouselSlider');

            $this->emit('alert', ['type' => 'success', 'message' => 'Carousel Slider Updated Successfully.']);

        }
        else {

            $this->validate([
                'edit_carousel_title' => 'required|min:5',
                'edit_carousel_link' => 'required',
                'edit_carousel_description' => 'required|min:100|max:300',
            ]);

            $carousel_slider->update([
                'title' => $this->edit_carousel_title,
                'description' => $this->edit_carousel_description,
                'link' => $this->edit_carousel_link,
            ]);

            $this->emit('editCarouselSlider');

            $this->emit('alert', ['type' => 'success', 'message' => 'Carousel Slider Updated Successfully.']);
        }
    }

    protected $rules = [
        'carousel_title' => 'required|min:5',
        'carousel_image' => 'required',
        'carousel_link' => 'required',
        'carousel_description' => 'required|min:100|max:300',
    ];

    public function createCarouselSlider() {
        $this->validate();

        $carousel_image = $this->carousel_image;

        if ($carousel_image) {

            // for thumbnail image 
            // Get filename with extension
            $filenameWithExt_carousel_image = $carousel_image->getClientOriginalName();

            // Get file path
            $filename_carousel_image = pathinfo($filenameWithExt_carousel_image, PATHINFO_FILENAME);

            // Remove unwanted characters
            $filename_carousel_image = preg_replace("/[^A-Za-z0-9 ]/", '', $filename_carousel_image);
            $filename_carousel_image = preg_replace("/\s+/", '-', $filename_carousel_image);

            // Get the original image extension
            $extension_carousel_image = $carousel_image->getClientOriginalExtension();

            // Create unique file name
            $fileNameToStore_carousel_image = $filename_carousel_image . '_' . time() . '.' . $extension_carousel_image;

            $resize_carousel_image = Image::make($carousel_image)->resize(null, 512, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');

            Storage::put("public/images/carousel_slider/{$fileNameToStore_carousel_image}", $resize_carousel_image->__toString());

            $new_carousel_image = 'images/carousel_slider/' . $fileNameToStore_carousel_image;
       }

        CarouselSlider::create([
            'title' => $this->carousel_title,
            'image' => $new_carousel_image,
            'link' => $this->carousel_link,
            'description' => $this->carousel_description,
        ]);

        $this->carousel_title = '';
        $this->carousel_image = '';
        $this->carousel_link = '';
        $this->carousel_description = '';
        
        $this->emit('addCarouselSlider');

        $this->emit('alert', ['type' => 'success', 'message' => 'Carousel Slider Created Successfully.']);

    }

    public function render()
    {
        $searchTerm = '%'.$this->Search.'%';

        $carousel_sliders = CarouselSlider::where('title', 'LIKE', $searchTerm)->paginate(5);
        return view('livewire.admin.admin-carousel-sliders-component', ['carousel_sliders'=>$carousel_sliders])->layout('layouts.admin');
    }
}
