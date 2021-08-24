<?php

namespace App\Http\Livewire;

use App\Models\BannerSlider;
use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        // Banner
        $banners=BannerSlider::all();
        // Latest Product
        $products=Product::orderBy('created_at','DESC')->get()->take(8);
        // Categories
        $categories=HomeCategory::find(1);
        $noofproducts=$categories->noofproducts;
        $cats=explode(',',$categories->category);
        $categories=Category::whereIn('id',$cats)->get();
        // on sale product
        $sproducts=Product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        $sale=Sale::find(1);
        return view('livewire.home-component',['banners'=>$banners,'categories'=>$categories,'products'=>$products,'noofproducts'=>$noofproducts,'sproducts'=>$sproducts,'sale'=>$sale])->layout('template.template');
    }
}
