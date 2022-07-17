<?php

namespace App\Actions;

class ValidateRemoveOrUpdateSessionCart
{
    public function handle($products)
    {
        if (!$products->count()) {
            session()->forget('cart');
            return true;
        }

        session()->put('cart', $products);
    }
}
