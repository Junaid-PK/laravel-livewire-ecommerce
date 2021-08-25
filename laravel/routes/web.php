<?php

use App\Http\Livewire\AdminCategories;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\UserDashboardComponent;
use App\Http\Livewire\AdminDashboardComponent;
use App\Http\Livewire\AdminHomeCategory;
use App\Http\Livewire\AdminProduct;
use App\Http\Livewire\AdminSale;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\Productdetails;
use App\Http\Livewire\SearchResult;
use App\Http\Livewire\BannerSlider;
use App\Http\Livewire\Wishlist;
use Illuminate\Support\Facades\Route;


Route::get('/',HomeComponent::class);
Route::get('/shop',ShopComponent::class);
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/checkout',CheckoutComponent::class);
Route::get('/product/{slug}',Productdetails::class)->name('product.details');
Route::get('/category/{slug}',CategoryComponent::class)->name('product.category');
Route::get('/search',SearchResult::class)->name('product.search');
Route::get('/wishlist',Wishlist::class)->name('product.wishlist');


Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories',AdminCategories::class)->name('admin.categories');
    Route::get('/admin/products',AdminProduct::class)->name('admin.products');
    Route::get('/admin/banners',BannerSlider::class)->name('admin.banners');
    Route::get('/admin/homecategorymanagement',AdminHomeCategory::class)->name('admin.homeCategories');
    Route::get('/admin/salemanagement',AdminSale::class)->name('admin.sales');
    
});