<?php

namespace App\Http\Controllers\Cardapio;

use App\Actions\IncrementQuantityProduct;
use App\Actions\ValidateRemoveOrUpdateSessionCart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\TypePayment;

class CartController extends Controller
{
    public function index()
    {
        $products = collect();

        if(session()->has('cart')){
            $products = session()->get('cart');
        }

        $typePayments = TypePayment::isActive()->get();

        return view('cardapio.cart', ['products' => $products, 'typePayments' => $typePayments]);
    }

    public function store(
        Product $product,
        IncrementQuantityProduct $incrementQuantityProduct
    )
    {
        if(session()->has('cart')) {
            $products = collect(session()->get('cart'));

            $products = $incrementQuantityProduct->handle($products, $product);

            session()->put('cart', $products);

            return redirect()->route('menu.cart');
        }

        session()->put('cart',collect()->push([
            'id' => $product->id,
            'product' => $product,
            'total' => $product->price,
            'quantity' => 1
        ]));

        return redirect()->route('menu.cart');
    }

    public function destroy(
        $index,
        ValidateRemoveOrUpdateSessionCart $validateRemoveOrUpdateSessionCart
    )
    {
        $products = session()->get('cart');

        $products->splice($index, 1);

        $validateRemoveOrUpdateSessionCart->handle($products);

        return back();
    }
}
