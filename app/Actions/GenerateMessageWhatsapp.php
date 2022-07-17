<?php

namespace App\Actions;

use App\Models\Client;
use App\Models\Order;

class GenerateMessageWhatsapp
{
    private $url = "https://wa.me/5519982756390";

    public function handle(Order $order, Client $client)
    {
        $pedido = $order->products->pluck('name')->join(', ',' e ');

        $text = $this->prepareText($client,$pedido, $order);

        return redirect()->to($this->url.'?text='.urlencode($text));
    }

    protected function prepareText($client, $pedido, $order)
    {
        return "
        Um pedido feito com sucesso!

        Nome: {$client->name},
        Endereço: {$client->address?->place}

        Pedido:
            {$pedido}

        Entrega: {$order->delivery}

        Total: {$order->total}
       ";
    }
}
