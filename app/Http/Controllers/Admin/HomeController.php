<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function __invoke()
   {
       $totalOrders = Order::count();
       $totalCustomers = Client::count();

       $lastFiveOrders = Order::with('client', 'products')
           ->latest()
           ->limit(5)
           ->get();

       return view('dashboard', [
           'totalOrders' => $totalOrders,
           'totalCustomers' => $totalCustomers,
           'lastFiveOrders' => $lastFiveOrders
       ]);
   }
}
