<?php

namespace App\Actions;

class IncrementQuantityProduct
{
    public function handle($products, $product)
    {
        if($products->where('id', $product->id)->count()) {
            return $products->map(function($item) use ($product) {
                if($item['id'] == $product->id) {
                    $item['quantity'] += 1;
                    $item['total'] = $product->price * $item['quantity'];
                }

                return $item;
            });
        }
    }
}
