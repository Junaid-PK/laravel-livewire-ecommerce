<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Component;
use Cart;

class ShopComponent extends Component
{

    public $sorting;
    public $pagesize;
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
    }

    // add product to cart
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('message', 'product added');
        return redirect()->route('product.cart');
    }
    // 
    public function addToWishlist($product_id, $product_name, $product_price)
    {
        # code...
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count','refreshComponent');
    }
    public function removeFromWishlist($product_id)
    {
        # code...
        foreach(Cart::instance('wishlist')->content() as $item)
        {
            if($item->id == $product_id){
                Cart::instance('wishlist')->remove($item->rowId);
                $this->emitTo('wishlist-count','refreshComponent');
                return;
            }
        }
    }
    public function render()
    {
        if ($this->sorting == 'date') {
            $product = Product::orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } elseif ($this->sorting == 'price') {
            $product = Product::orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } elseif ($this->sorting == 'price-desc') {
            $product = Product::orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } else {
            $product = Product::paginate($this->pagesize);
        }
        $categories = Category::all();


        return view('livewire.shop-component', [
            'products' => $product,
            'categories' => $categories,
        ])->layout('template.template');
    }
}
