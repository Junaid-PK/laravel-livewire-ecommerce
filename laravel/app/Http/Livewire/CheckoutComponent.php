<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Cart;
use Exception;
use Stripe;

class CheckoutComponent extends Component
{
    public $shiptodiffaddress;
    public $state;
    public $shippingstate;
    public $paymentmode;
    public $thankyou;
    public $cardstate;
    public function placeOrder()
    {
        Validator::make($this->state, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'line1' => 'required',
            'line2' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
        ])->validate();

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->firstname = $this->state['firstname'];
        $order->lastname = $this->state['lastname'];
        $order->email = $this->state['email'];
        $order->mobile = $this->state['phone'];
        $order->line1 = $this->state['line1'];
        $order->line2 = $this->state['line2'];
        $order->city = $this->state['city'];
        $order->province = $this->state['province'];
        $order->country = $this->state['country'];
        $order->zipcode = $this->state['zipcode'];
        $order->status = 'ordered';
        $order->is_shipping_different = $this->shiptodiffaddress ? 1 : 0;
        $order->save();
        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $item->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }
        if ($this->shiptodiffaddress) {
            Validator::make($this->shippingstate, [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'line1' => 'required',
                'line2' => 'required',
                'city' => 'required',
                'province' => 'required',
                'country' => 'required',
                'zipcode' => 'required'
            ])->validate();
            $shpping = new Shipping();
            $shpping->firstname = $this->shippingstate['firstname'];
            $shpping->lastname = $this->shippingstate['lastname'];
            $shpping->email = $this->shippingstate['email'];
            $shpping->mobile = $this->shippingstate['phone'];
            $shpping->line1 = $this->shippingstate['line1'];
            $shpping->line2 = $this->shippingstate['line2'];
            $shpping->city = $this->shippingstate['city'];
            $shpping->province = $this->shippingstate['province'];
            $shpping->country = $this->shippingstate['country'];
            $shpping->zipcode = $this->shippingstate['zipcode'];
            $shpping->save();
        }
        if($this->paymentmode == 'cod')
        {
            $this->makeTransaction($order->id,'pending');
            $this->resetCart();
        }
        else if($this->paymentmode == 'card')
        {
            $Stripe = Stripe::make(env('STRIPE_KEY'));
            try{
                $token=$Stripe->tokens()->create([
                    'card' => [
                        'number'=>$this->cardstate['cardno'],
                        'exp_month'=>$this->cardstate['exp-m'],
                        'exp_year'=>$this->cardstate['exp-y'],
                        'cvc'=>$this->cardstate['cvc'],
                    ]
                    ]);
            
            if(!isset($token['id']))
            {
                session()->flash('stripe_error','The stripe token was not generated');
                $this->thankyou = 0;
            }
            $customer=$Stripe->customer()->create([
                'name'=>$this->state['firstname'].''.$this->state['lastname'],
                'email'=>$this->state['email'],
                'email'=>$this->state['phone'],
                'address'=>[
                    'line1'=>$this->state['line1'],
                    'postal_code'=>$this->state['zipcode'],
                    'city'=>$this->city,
                    'state'=>$this->state['province'],
                    'country'=>$this->state['country'],
                ],
                'shipping'=>[
                    'name'=>$this->shippingstate['firstname'].''.$this->shippingstate['lastname'],
                    'line1'=>$this->shippingstate['line1'],
                    'postal_code'=>$this->shippingstate['zipcode'],
                    'city'=>$this->city,
                    'state'=>$this->shippingstate['province'],
                    'country'=>$this->shippingstate['country'],
                ],
                'source'=>$token['id']
            ]);
            $charge = $Stripe->charges()->create([
                'customer'=>$customer['id'],
                'currency'=>'USD',
                'amount'=>session()->get('checkout')['total'],
                'description'=>'Payment for order no '.$order->id
            ]);
            if($charge['status']=='succeeded')
            {
                $this->makeTransaction($order->id,'approved');
                $this->resetCart();
            }
            else{
                session()->flash('stripe_error','Error In Transaction');
                $this->thankyou=0;
            }}
            catch(Exception $e){
                session()->flash('stripe_error',$e->getMessage());
                $this->thankyou =0;
            }
        }
    }
    public function resetCart()
    {
        $this->thankyou=1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }
    public function makeTransaction($order_id,$status)
    {
        # code...
        $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order_id;
            $transaction->mode=$this->paymentmode;
            $transaction->status = $status;
            $transaction->save();

    }
    public function verifyForCheckout()
    {
        # code...
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        elseif($this->thankyou)
        {
            return  redirect()->route('thankyou');
        }
        elseif(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }
    }
    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('template.template');
    }
}
