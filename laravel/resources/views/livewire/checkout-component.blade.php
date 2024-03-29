<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="" class="link">home</a></li>
                <li class="item-link"><span>Checkout</span></li>
            </ul>
        </div>
        <div class=" main-content-area" style="background-color: white;box-shadow: 2px 3px 108px -2px rgba(82,76,76,0.75);
        -webkit-box-shadow: 2px 3px 108px -2px rgba(82,76,76,0.75);
        -moz-box-shadow: 2px 3px 108px -2px rgba(82,76,76,0.75);">
			<form action="" wire:submit.prevent='placeOrder' style="margin: 14px">
            <div class="row">
                <div class="col-md-12">

                    <div class="wrap-address-billing">
                        <h3 class="box-title">Billing Address</h3>
                        <p class="row-in-form">
                            <label for="fname">first name<span>*</span></label>
                            <input id="fname" type="text" name="fname" value="" placeholder="Your name"
                                wire:model='state.firstname'>
							@error('firstname')
								<span class="text-danger">{{$message}}</span>
							@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="lname">last name<span>*</span></label>
                            <input id="lname" type="text" name="lname" value="" placeholder="Your last name"
                                wire:model='state.lastname'>
								@error('lastname')
								<span class="text-danger">{{$message}}</span>
							@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="email">Email Addreess:</label>
                            <input id="email" type="email" name="email" value="" placeholder="Type your email"
                                wire:model='state.email'>
								@error('email')
								<span class="text-danger">{{$message}}</span>
							@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="phone">Phone number<span>*</span></label>
                            <input id="phone" type="number" name="phone" value="" placeholder="10 digits format"
                                wire:model='state.phone'>
								@error('phone')
								<span class="text-danger">{{$message}}</span>
							@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="add">Line 1:</label>
                            <input id="add" type="text" name="add" value="" placeholder="Street at apartment number"
                                wire:model='state.line1'>
								@error('line1')
								<span class="text-danger">{{$message}}</span>
							@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="add">Line 2:</label>
                            <input id="add" type="text" name="add" value="" placeholder="Street at apartment number"
                                wire:model='state.line2'>
								@error('line2')
								<span class="text-danger">{{$message}}</span>
							@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="country">Country<span>*</span></label>
                            <input id="country" type="text" name="country" value="" placeholder="United States"
                                wire:model='state.country'>
								@error('country')
								<span class="text-danger">{{$message}}</span>
							@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="zip-code">Postcode / ZIP:</label>
                            <input id="zip-code" type="number" name="zip-code" value="" placeholder="Your postal code"
                                wire:model='state.zipcode'>
								@error('zipcode')
								<span class="text-danger">{{$message}}</span>
							@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="city">Province<span>*</span></label>
                            <input id="province" type="text" name="province" value="" placeholder="City name"
                                wire:model='state.province'>
								@error('province')
								<span class="text-danger">{{$message}}</span>
							@enderror
                        </p>
                        <p class="row-in-form">
                            <label for="city">Town / City<span>*</span></label>
                            <input id="city" type="text" name="city" value="" placeholder="City name"
                                wire:model='state.city'>
								@error('city')
								<span class="text-danger">{{$message}}</span>
							@enderror
                        </p>
                        <p class="row-in-form fill-wife">
                            <label class="checkbox-field">
                                <input name="different-add" id="different-add" value="1" type="checkbox"
                                    wire:model='shiptodiffaddress'>
                                <span>Ship to a different address?</span>
                            </label>
                        </p>
                    </div>

                </div>
                @if ($shiptodiffaddress)


                    <div class="col-md-12">

                        <div class="wrap-address-billing">
                            <h3 class="box-title">Shipping Address Address</h3>
                            <p class="row-in-form">
                                <label for="fname">first name<span>*</span></label>
                                <input id="fname" type="text" name="fname" value="" placeholder="Your name"
                                    wire:model='shippingstate.firstname'>
									@error('firstname')
								<span class="text-danger">{{$message}}</span>
							@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="lname">last name<span>*</span></label>
                                <input id="lname" type="text" name="lname" value="" placeholder="Your last name"
                                    wire:model='shippingstate.lastname'>
									@error('lastname')
								<span class="text-danger">{{$message}}</span>
							@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="email">Email Addreess:</label>
                                <input id="email" type="email" name="email" value="" placeholder="Type your email"
                                    wire:model='shippingstate.email'>
									@error('email')
								<span class="text-danger">{{$message}}</span>
							@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="phone">Phone number<span>*</span></label>
                                <input id="phone" type="number" name="phone" value="" placeholder="10 digits format"
                                    wire:model='shippingstate.phone'>
									@error('phone')
								<span class="text-danger">{{$message}}</span>
							@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="add">Line 1:</label>
                                <input  type="text" value="" placeholder="Street at apartment number"
                                    wire:model='shippingstate.line1'>
									@error('line1')
								<span class="text-danger">{{$message}}</span>
							@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="add">Line 2:</label>
                                <input  type="text"  value="" placeholder="Street at apartment number"
                                    wire:model='shippingstate.line2'>
									@error('line2')
								<span class="text-danger">{{$message}}</span>
							@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="country">Country<span>*</span></label>
                                <input id="country" type="text" name="country" value="" placeholder="United States"
                                    wire:model='shippingstate.country'>
									@error('country')
								<span class="text-danger">{{$message}}</span>
							@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="zip-code">Postcode / ZIP:</label>
                                <input id="zip-code" type="number" name="zip-code" value=""
                                    placeholder="Your postal code" wire:model='shippingstate.zipcode'>
									@error('zipcode')
								<span class="text-danger">{{$message}}</span>
							@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="city">Province<span>*</span></label>
                                <input  type="text"  value="" placeholder="City name"
                                    wire:model='shippingstate.province'>
									@error('province')
								<span class="text-danger">{{$message}}</span>
							@enderror
                            </p>
                            <p class="row-in-form">
                                <label for="city">Town / City<span>*</span></label>
                                <input  type="text" value="" placeholder="City name"
                                    wire:model='shippingstate.city'>
									@error('city')
								<span class="text-danger">{{$message}}</span>
							@enderror
                            </p>
                        </div>

                    </div>
            </div>
            @endif
            <div class="summary summary-checkout">
                <div class="summary-item payment-method">
                    <h4 class="title-box">Payment Method</h4>
                    @if($paymentmode=='card')
                    <div class="wrap-address-billing">
                        @if (Session::has('stripe_error'))
                            <div class="alert alert-danger">{{Session::get('stripe_error')}}</div>
                        @endif
                        <p class="row-in-form">
                            <label for="card-no">Card Number<span>*</span></label>
                            <input id="cardNo" type="text" name="card-no" value="" placeholder="Card Number"
                                wire:model='cardstate.cardno'>
                                @error('cardno')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </p>
                        <p class="row-in-form">
                            <label for="card-no">Expiry Month<span>*</span></label>
                            <input id="exp-m" type="text" name="exp-m" value="" placeholder="Card Expiry Month"
                                wire:model='cardstate.exp-m'>
                                @error('exp-m')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </p>
                        <p class="row-in-form">
                            <label for="exp-y">Expiry Year<span>*</span></label>
                            <input id="cardNo" type="text" name="exp-y" value="" placeholder="Card Expiry Year"
                                wire:model='cardstate.exp-y'>
                                @error('exp-y')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </p>
                        <p class="row-in-form">
                            <label for="cvc">CVV<span>*</span></label>
                            <input id="cvc" type="password" name="cvc" value="" placeholder="CVC"
                                wire:model='cardstate.cvc'>
                                @error('cvc')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </p>
                    </div>
                    @endif
                    <div class="choose-payment-methods">
                        <label class="payment-method">
                            <input  id="payment-method-bank" value="cod" type="radio" wire:model='paymentmode'>
                            <span>Cash on Delivery</span>
                            <span class="payment-desc">Order Now Pay on Delivery <i
                                    class="mdi mdi-truck-delivery-outline:"></i></span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model='paymentmode'>
                            <span>Credit Card</span>
                            <span class="payment-desc">There are many variations of passages of Lorem Ipsum
                                available</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model='paymentmode'>
                            <span>Paypal</span>
                            <span class="payment-desc">You can pay with your credit</span>
                            <span class="payment-desc">card if you don't have a paypal account</span>
                        </label>
						@error('paymentmode')
								<span class="text-danger">{{$message}}</span>
							@enderror
                    </div>
					@if (Session::has('checkout'))
					<p class="summary-info grand-total"><span>Grand Total</span> <span
                            class="grand-total-price">${{Session::get('checkout')['total']}}</span></p>
					@endif
                    <button type="submit" class="btn btn-medium">Place order now</button>
                </div>
                <div class="summary-item shipping-method">
                    <h4 class="title-box f-title">Shipping method</h4>
                    <p class="summary-info"><span class="title">Flat Rate</span></p>
                    <p class="summary-info"><span class="title">Fixed $0.00</span></p>
                    <h4 class="title-box">Discount Codes</h4>
                </div>
            </div>
		</form>

        </div>
        <!--end main content area-->
    </div>
    <!--end container-->

</main>
