<?php
namespace App\Http\Livewire;
use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategory extends Component
{
    public $selected_category=[];
    public $noofproducts;
    public function mount()
    {
        $category=HomeCategory::find(1);
        $this->selected_category=explode(',',$category->category);
        $this->noofproducts=$category->noofproducts;
    }
    public function updateCategory()
    {
        $category=HomeCategory::find(1);
        $category->category=implode(',',$this->selected_category);
        $category->noofproducts=$this->noofproducts;
        $category->save();
        session()->flash('message','Category Updated Successfully');
    }
    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin-home-category',['categories'=>$categories])->layout('admintemplate.template');
    }
}