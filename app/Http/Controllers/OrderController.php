<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\Category;
use Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('user_id', Auth::id())->get()->toArray();
        $orders = array_reverse($orders);

        if($orders != NULL) {
            for($i = 0; $i < count($orders); $i++){
                $totalPrice = 0;
                $order = $orders[$i];
                $order['data'] = json_decode($order['data'], true);

                $items = array();
                for($r = 0; $r < count($order['data']); $r++){
                    $data = $order['data'][$r];

                    $item = Product::where('id', $data['article_id'])->first();
                    $item['amount'] = $data['amount'];

                    $category = Category::where('id', $item['category_id'])->first();
                    array_push($items, [$item, $category]);

                    $totalPrice += $data['amount'] * $item['price'];
                }
                $order['data'] = $items;
                $order['totalPrice'] = $totalPrice;
                $orders[$i] = $order;
            }
        }
        return view('orders', compact('orders'));

    }
}
