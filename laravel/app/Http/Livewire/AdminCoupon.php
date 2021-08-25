<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class AdminCoupon extends Component
{
    public $state;
    public $coupon;
    public $couponidbeingdeleted=null;
    public $showEditModel = false;
    
    public function mount()
    {
        $this->state['type']='value';
    }
    
    public function toggleModal()
    {
        $this->state=[];
        $this->dispatchBrowserEvent('show-coupon-modal');
        $this->showEditModel = false;
    }

    public function addCoupon(){
        Validator::make($this->state,[
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=> 'required|numeric'
        ])->validate();

        $coupon=new Coupon();
        $coupon->code = $this->state['code'];
        $coupon->type = $this->state['type'];
        $coupon->value = $this->state['value'];
        $coupon->cart_value = $this->state['cart_value'];
        $coupon->save();
        session()->flash('message','Coupon Added Successfully');
        $this->dispatchBrowserEvent('hide-coupon-modal');

    }

    public function editCoupon(Coupon $coupon){
        $this->showEditModel = true;
        $this->dispatchBrowserEvent('show-editcoupon-modal');
        $this->state=$coupon->toArray();
        $this->coupon=$coupon;
    }

    public function updateCoupon(){
        Validator::make($this->state,[
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=> 'required|numeric'
        ])->validate();
        $coupon=$this->coupon;
        $coupon->code = $this->state['code'];
        $coupon->type = $this->state['type'];
        $coupon->value = $this->state['value'];
        $coupon->cart_value = $this->state['cart_value'];
        $coupon->save();
        session()->flash('message','Coupon Updated Successfully');
        $this->dispatchBrowserEvent('hide-coupon-modal');
    }

    public function deleteCoupon($couponid)
    {
        $this->couponidbeingdeleted=$couponid;
        $this->dispatchBrowserEvent('confirm-coupon-modal');
    }
    public function delete()
    {
        $coupon=Coupon::find($this->couponidbeingdeleted);
        $coupon->delete();
        session()->flash('message','Coupon Deleted Successfully');
        $this->dispatchBrowserEvent('hide-coupon-confirm-modal');
    }

    public function render()
    {
        $coupons=Coupon::all();
        return view('livewire.admin-coupon',['coupons'=>$coupons])->layout('admintemplate.template');
    }
}
