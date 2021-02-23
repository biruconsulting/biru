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

    protected $rules = [
        'carousel_title' => 'required',
        'carousel_image' => 'required',
        'carousel_link' => 'required',
        'carousel_description' => 'required',
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
