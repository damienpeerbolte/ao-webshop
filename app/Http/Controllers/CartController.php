<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Classes\Cart;
use App\Product;
use App\Category;
use App\Order;
use Auth;

class CartController extends Controller
{
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request) {
         $cart = new Cart();
         $cartData = $cart->getCart();
         $totalPrice = 0;

         $items = array();
         if($cartData != NULL) {
             for ($i=0; $i < count($cartData); $i++) {
                 $item = Product::where('id', $cartData[$i]['article_id'])->first();
                 $item['amount'] = $cartData[$i]['amount'];

                 $category = Category::where('id', $item['category_id'])->first();
                 array_push($items, [$item, $category]);
                 $totalPrice += $cartData[$i]['amount'] * $item['price'];
             }
         }
         return view('cart', compact('items', 'totalPrice'));
     }

     // This function will add an item to the cart from the shop page.
     public function addToCartViaShop($id){
         $cart = new Cart();
         $cart->addToCart($id);
         return redirect("home?added");
     }

     // This function will add an item to the cart from the article page.
     public function addToCartViaArticle($category, $article, $id){
         $cart = new Cart();
         $cart->addToCart($id);
         return redirect("/" . $category . "/" . $article . "?added");
     }

    // This function will add an amount of an item.
    public function addAmount($id){
        $cart = new Cart();
        $cart->addToCart($id);
        return redirect("cart");
    }

    // This function will remove an amount of an item.
    public function removeAmount($id){
        $cart = new Cart();
        $cart->removeFromCart($id, 1);
        return redirect("cart");
    }

    // This function will delete an item from the cart.
    public function deleteFromCart($id){
        $cart = new Cart();
        $amount = $cart->getAmountFromCart($id);
        $cart->removeFromCart($id, $amount);
        return redirect("cart");
    }

    public function checkout() {
        if(Auth::check()) {
            $cart = new Cart();
            $cartData = json_encode($cart->getCart());
            if($cartData != null || strlen($cartData) <= 0 || $cartData !== "" || $cartData != 'null'){
                $cart->deleteCart();
                Order::insert(['user_id' => Auth::id(), 'data' => $cartData]);
                return redirect("/home?success");
            } else {
                return redirect("/cart");
            }
        } else {
            return redirect("/login");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
