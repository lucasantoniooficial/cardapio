<?php

namespace App\Actions;

class PrepareProductsRelation
{
    public function handle()
    {
        if(session()->has('cart')) {
            $products = session()->get('cart');
            return $products->keyBy('id')->map(function($product) {
                return [
                    'quantity' => $product['quantity']
                ];
            });
        }

        return [];
    }
}
