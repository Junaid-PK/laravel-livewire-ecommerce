<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;

class AdminCategories extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $state;
    public $category;
    public $useridbeingremoved =null;
    public $showEditModel = false;
    public function toggleModel()
    {
        $this->state=[];
        $this->showEditModel = false;
        $this->dispatchBrowserEvent('show-model');
    }
    public function addCategory()
    {
        $validateData= Validator::make($this->state,[
            'name'=>'required',
            'slug'=>'required'
        ])->validate();

        Category::create($validateData);
        session()->flash('message','Category Added Successfully');
        $this->dispatchBrowserEvent('hide-model');
    }
    public function editCategory(Category $category)
    {
        $this->showEditModel = true;
        $this->category=$category;
        $this->state=$category->toArray();
        $this->dispatchBrowserEvent('show-model');
    }
    public function updateCategory()
    {
        $validateData= Validator::make($this->state,[
                'name'=>'required',
                'slug'=>'required'
            ])->validate();
        $this->category->update($validateData);
        session()->flash('message','Category Updated Successfully');
        $this->dispatchBrowserEvent('hide-model');
    }
    public function deleteCategory($cId)
    {
        $this->useridbeingremoved =$cId;
        $this->dispatchBrowserEvent('confirm-model');
    }
    public function delete()
    {
        $c=Category::find($this->useridbeingremoved);
        $c->delete();
        session()->flash('message','Category Deleted');
        $this->dispatchBrowserEvent('hide-confirm-model');
    }
    
    public function render()
    {
        $categories=Category::latest()->Paginate(5);
        return view('livewire.admin-categories',['categories'=>$categories])->layout('admintemplate.template');
    }
}
