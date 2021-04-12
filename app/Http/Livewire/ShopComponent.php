<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    
    // product adding to the cart
    public function store($product_id, $product_name, $product_price){
        Cart::add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        
        session()->flash('success_message', 'Items added to the cart');
        return redirect()->route('product.cart');
    }

    //shop page
    use WithPagination;
    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.shop-component', ['products'=>$products])->layout('layouts.base');
    }
}
