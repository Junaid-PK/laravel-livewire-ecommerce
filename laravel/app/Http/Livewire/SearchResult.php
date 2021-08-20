<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Component;
use Cart;
class SearchResult extends Component
{

    public $sorting;
    public $pagesize;
    public $search;
    public $product_cat;
    public $product_cat_id;
    public function mount(){
        $this->sorting="default";
        $this->pagesize=12;
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }

    // add product to cart
    public function store($product_id,$product_name,$product_price)
        {
            Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
            session()->flash('message','product added');
            return redirect()->route('product.cart'); 
              
        }
    // 
    public function render()
    {

        if($this->sorting == 'date'){
            $product=Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pagesize);
        }elseif($this->sorting == 'price'){
            $product=Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'price-desc'){
            $product=Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }else{
            $product=Product::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->product_cat_id.'%')->paginate($this->pagesize);
        }
        $categories = Category::all();


        return view('livewire.search-result',[
            'products' => $product,
            'categories' => $categories,
        ])->layout('template.template');
    }
}

