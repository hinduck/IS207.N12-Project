<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomeSlider;
use Carbon\Carbon;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    public $newImage;
    public $slider_id;

    public function mount($slide_id)
    {
        $slider = HomeSlider::find($slide_id);
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->image = $slider->image;
        $this->status = $slider->status;
        $this->slider_id = $slider->id;
    }

    public function updateSlide()
    {
        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $slider->status = $this->status;
        if ($this->newImage) {
            unlink('assets/images/sliders/' . $slider->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('sliders', $imageName);
            $slider->image = $imageName;
        }
        $slider->save();
        session()->flash('message', 'Trang Chiếu đã cập nhật thành công!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout("layouts.base");
    }
}
