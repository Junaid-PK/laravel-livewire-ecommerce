<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use Livewire\Component;
use Cart;
class CartComponent extends Component
{
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxtotalAfterDiscount;
    public $totalAfterDiscount;

    public function calculateDiscount()
    {
        if(session()->has('coupon'))
        {
            if(session()->get('coupon')['type'] == 'fixed')
            {
                $this->discount = session()->get('coupon')['value'];
            }
            else{
                $this->discount = (Cart::instance('cart')->subtotal()*session()->get('coupon')['value'])/100;
            }
            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal()-$this->discount;
            $this->taxtotalAfterDiscount = ($this->subtotalAfterDiscount* config('cart.tax'))/100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxtotalAfterDiscount;
        }
    }
    public function validatedCoupon()
    {
        $coupon=Coupon::where('code',$this->couponCode)->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();
        if(!$coupon){
            session()->flash('error','Coupon Code is Invalid');
        }
        session()->put('coupon',[
            'code'=>$coupon->code,
            'value'=>$coupon->value,
            'type'=>$coupon->type,
            'cart_value'=>$coupon->value
        ]);
    }
    public function removeCoupon()
    {
        session()->forget('coupon');
    }
    public function increaseQuantity($rowId)
    {
        $item=Cart::instance('cart')->get($rowId);
        $qty=$item->qty+1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count','refreshComponent');
    }
    public function decreaseQuantity($rowId)
    {
        $item=Cart::instance('cart')->get($rowId);
        $qty=$item->qty-1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count','refreshComponent');
    }
    public function deleteCartItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count','refreshComponent');
        session()->flash('message','Product Removed');
    }
    public function emptyCart()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count','refreshComponent');
        
    }
    public function render()
    {
        if(session()->has('coupon'))
        {
            if(Cart::instance('cart')->subtotal()< session()->get('coupon')['cart_value'])
            {
                session()->forget('coupon');
            }
            else{
                $this->calculateDiscount();
            }
        }
        return view('livewire.cart-component')->layout('template.template');
    }
}
