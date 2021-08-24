<?php

namespace App\Http\Livewire;

use App\Models\BannerSlider as ModelsBannerSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class BannerSlider extends Component
{
    use WithFileUploads;
    public $image;
    public $state;
    public $banner;
    public $showEditModel = false;
    public $banneridbeingdeleted=null;
    public function mount()
    {
        $this->state['banner_status']='instock';
    }
    public function toggleModal()
    {
        $this->state=[];
        $this->dispatchBrowserEvent('show-banner-modal');
        $this->showEditModel = false;
    }
    public function addBanner()
    {
        $banner=new ModelsBannerSlider();
        $banner->title=$this->state['title'];
        $banner->subtitle=$this->state['subtitle'];
        $banner->price=$this->state['price'];
        $imagename=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('banners',$imagename);
        $banner->image=$imagename;
        $banner->banner_status=$this->state['banner_status'];
        $banner->save();
        session()->flash('message','Banner Added Successfully');
        $this->dispatchBrowserEvent('hide-banner-modal');
    }

    public function editBanner(ModelsBannerSlider $banner)
    {
        $this->showEditModel = true;
        $this->dispatchBrowserEvent('show-editbanner-modal');
        $this->banner=$banner;
        $this->state=$banner->toArray();
        $this->image='';
    }
    public function updateBanner()
    {
        $banner=$this->banner;
        $banner->title=$this->state['title'];
        $banner->subtitle=$this->state['subtitle'];
        $banner->price=$this->state['price'];
        $imagename=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('banners',$imagename);
        $banner->image=$imagename;
        $banner->banner_status=$this->state['banner_status'];
        $banner->save();
        session()->flash('message','Banner Updated Successfully');
        $this->dispatchBrowserEvent('hide-banner-modal');
    }
    public function deleteBanner($bannerid)
    {
        $this->banneridbeingdeleted=$bannerid;
        $this->dispatchBrowserEvent('confirm-banner-modal');
    }
    public function delete()
    {
        $banner=ModelsBannerSlider::find($this->banneridbeingdeleted);
        $banner->delete();
        session()->flash('message','Bannner Deleted Successfully');
        $this->dispatchBrowserEvent('hide-banner-confirm-modal');
    }
    public function render()
    {
        $banners=ModelsBannerSlider::all();
        return view('livewire.banner-slider',['banners'=>$banners])->layout('admintemplate.template');
    }
}
