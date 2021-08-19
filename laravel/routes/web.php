<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\UserDashboardComponent;
use App\Http\Livewire\AdminDashboardComponent;
use App\Http\Livewire\Productdetails;
use Illuminate\Support\Facades\Route;


Route::get('/',HomeComponent::class);
Route::get('/shop',ShopComponent::class);
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/checkout',CheckoutComponent::class);
Route::get('/product/{slug}',Productdetails::class)->name('product.details');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
});