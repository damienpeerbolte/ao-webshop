<?php
namespace App\Http\Classes;

use Illuminate\Http\Request;
use Cookie;

class Cart{
    private $cart = array();

    /**
    *
    * This function will add an item to the cart.
    *
    */
    public function addToCart($articleId){
        $this->getCart();
        $this->cart = json_decode(Cookie::get('cart'), true);

        $hasFound = false;
        if($this->cart != null){
            foreach ($this->cart as &$item) {
                if($item['article_id'] == $articleId){
                    $item['amount'] += 1;
                    $hasFound = true;
                }
            }
        }else{
            $this->cart = array();
        }

        if($hasFound == false){
            array_push($this->cart, ['article_id' => $articleId, 'amount' => 1]);
        }
        $this->saveCart();
    }

    /**
    *
    * This function will remove an item from the cart.
    *
    */
    public function removeFromCart($articleId, $amount = 1){
        $this->cart = $this->getCart();

        if($this->cart != null){
            foreach ($this->cart as $valueKey => &$item) {
                if($item['article_id'] == $articleId){
                    if($item['amount'] - $amount <= 0){
                        array_splice($this->cart, $valueKey, 1);
                        array_values($this->cart);
                    }else{
                        $item['amount'] -= $amount;
                    }
                }
            }
            $this->saveCart();
        }
    }
/**
    *
    * This function will get the amount of an item from the cart.
    *
    */
    public function getAmountFromCart($articleId){
        $this->getCart();
        if($this->cart != null){
            foreach ($this->cart as &$item) {
                if($item['article_id'] == $articleId){
                    return $item['amount'];
                }
            }
        }
        return 0;
    }

    /**
    *
    * This function will get the cart.
    *
    */
    public function getCart(){
        $this->cart = json_decode(Cookie::get('cart'), true);
        return $this->cart;
    }

    /**
    *
    * This function will delete the cart.
    *
    */
    public function deleteCart(){
        Cookie::queue(Cookie::make('cart', '', 45000));
        $this->cart = json_decode(Cookie::get('cart'), true);
    }

    /**
    *
    * This function will save the cart.
    *
    */
    private function saveCart(){
        Cookie::queue(Cookie::make('cart', json_encode($this->cart), 45000));
    }
}
