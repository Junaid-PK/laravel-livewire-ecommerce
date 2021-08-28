<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\WithFileUploads;

// use Illuminate\Support\Facades\Validator;

class AdminProduct extends Component
{
    public $state;
    public $sale_price;
    public $image;
    public $stock_status;
    public $featured;
    public $product;
    public $showEditModel = false;
    public $productidbeingdeleted=null;
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme='bootstrap';
    public function toggleModal()
    {
        $this->state=[];
        $this->dispatchBrowserEvent('show-product-modal');
        $this->showEditModel = false;
    }
    public function mount()
    {
        $this->stock_status='instock';
        $this->featured=0;
    }
    public function addProduct()
    {
        $product=new Product();
        $product->name=$this->state['name'];
        $product->slug=$this->state['slug'];
        $product->short_description=$this->state['shortDesc'];
        $product->description=$this->state['desc'];
        $product->regular_price=$this->state['regularPrice'];
        $product->sale_price=$this->sale_price;
        $product->SKU=$this->state['sku'];
        $product->quantity=$this->state['quantity'];
        $product->category_id=$this->state['category'];
        $product->featured=$this->featured;
        $product->stock_status=$this->stock_status;
        $imagename=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products',$imagename);
        $product->image=$imagename;
        $product->save();
        session()->flash('message','Product added Successfully');
        $this->dispatchBrowserEvent('hide-product-modal');
    }
    public function updateProduct()
    {
        $product=$this->product;
        $product->name=$this->state['name'];
        $product->slug=$this->state['slug'];
        $product->short_description=$this->state['shortDesc'];
        $product->description=$this->state['desc'];
        $product->regular_price=$this->state['regularPrice'];
        $product->sale_price=$this->sale_price;
        $product->SKU=$this->state['sku'];
        $product->quantity=$this->state['quantity'];
        $product->category_id=$this->state['category'];
        $product->featured=$this->featured;
        $product->stock_status=$this->stock_status;
        $imagename=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products',$imagename);
        $product->image=$imagename;
        $product->save();
        session()->flash('message','Product Updated Successfully');
        $this->dispatchBrowserEvent('hide-product-modal');
    }

    public function editProduct(Product $product)
    {
        $this->showEditModel = true;
        $this->product=$product;
        $this->state=$product->toArray();
        $this->stock_status=$product->stock_status;
        $this->featured=$product->featured;
        $this->dispatchBrowserEvent('show-product-modal');
    }

    public function deleteProduct($pid)
    {
        $this->productidbeingdeleted=$pid;
        $this->dispatchBrowserEvent('confirm-product-modal');
    }
    public function delete()
    {
        $product=Product::find($this->productidbeingdeleted);
        if($product->image){
            unlink('asset/images/products'.'/'.$product->image);
        }
        $product->delete();
        session()->flash('message','Product Deleted');
        $this->dispatchBrowserEvent('hide-product-confirm-modal');
    }

    public function render()
    {   $categories=Category::all();
        $products=Product::latest()->Paginate(10);
        return view('livewire.admin-product',['products'=>$products],['categories'=>$categories])->layout('admintemplate.template');
    }
}
