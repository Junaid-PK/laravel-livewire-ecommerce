<?php
namespace App\Http\Livewire;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Cart;
class Productdetails extends Component
{
    public $slug;
    public $qty;
    public function mount($slug)
    {
        $this->slug=$slug;
        $this->qty=1;
    }
    public function increaseqty()
    {
        $this->qty++;
    }
    public function decreaseqty()
    {
        if($this->qty>1){
            $this->qty--;
        }
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\Product');
        session()->flash('message','product added');
        return redirect()->route('product.cart'); 
    }
    public function render()
    {
        $product=Product::where('slug',$this->slug)->first();
        $popular_product=Product::inRandomOrder()->limit(4)->get();
        $related_product=Product::where('category_id',$product->category_id)->inRandomOrder()->limit(4)->get();
        $sale=Sale::find(1);
        return view('livewire.productdetails',['product'=>$product,'popular_product'=>$popular_product,'related_product'=>$related_product,'sale'=>$sale])->layout('template.template');
    }
}