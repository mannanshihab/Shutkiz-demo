<?php

namespace App\Helpers;

use App\Models\Product;
use App\Models\ProductPriceRange;
use Illuminate\Support\Facades\Cookie;

class CartManagement{

    #add item to cart
    static public function addItemToCart($product_id){
        $cart_items = self::getCartItemsFromCookie();

        $existing_item = null;

        foreach($cart_items as $key => $item){
            if($item['product_id'] == $product_id){
                $existing_item = $key;
                break;
            }
        }

        if($existing_item !== null){
            $cart_items[$existing_item]['quantity']++;
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];
        }else{
           
            $product = Product::where('id', $product_id)->first(['id', 'name', 'images']);

            $productPriceRange = ProductPriceRange::where('product_id', $product_id)->first(['id', 'weight','product_id', 'price']);
           
            if($product){
                if($productPriceRange){
                    $cart_items[] = [
                        'product_id'    => $product_id,
                        'name'          => $product->name,
                        'image'         => $product->images[0],
                        'quantity'      => 1,
                        'priceRange_id' => $productPriceRange->weight,
                        'weight'        => $productPriceRange->id,
                        'unit_amount'   => $productPriceRange->price,
                        'total_amount'  => $productPriceRange->price
                    ];
                }
            }
           
        }

        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }

    #add item to cart with qty 
    static public function addItemToCartWithQty($product_id, $qty = 1){
        $cart_items = self::getCartItemsFromCookie();

        $existing_item = null;

        foreach($cart_items as $key => $item){
            if($item['product_id'] == $product_id){
                $existing_item = $key;
                break;
            }
        }

        if($existing_item !== null){
           
            $cart_items[$existing_item]['quantity'] = $qty;
            $cart_items[$existing_item]['total_amount'] = $cart_items[$existing_item]['quantity'] * $cart_items[$existing_item]['unit_amount'];

        }else{

            $product = Product::where('id', $product_id)->first(['id', 'name', 'images']);
            $productPriceRange = ProductPriceRange::where('product_id', $product_id)->first(['id', 'weight','product_id', 'price']);
           
            if($product){
                $cart_items[] = [
                    'product_id'    => $product_id,
                    'name'          => $product->name,
                    'image'         => $product->images[0],
                    'quantity'      => $qty,
                    'priceRange_id' => $productPriceRange->weight,
                    'weight'        => $productPriceRange->id,
                    'unit_amount'   => $productPriceRange->price,
                    'total_amount'  => $productPriceRange->price
                ];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }

    #remove item to cart
    static public function removeCartItems($product_id){
        $cart_items = self::getCartItemsFromCookie();

        foreach($cart_items as $key => $item){
            if($item['product_id'] == $product_id){
                unset($cart_items[$key]);
            }
        }

        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    #add cart item to Cookie
    static public function addCartItemsToCookie($cart_items){
        Cookie::queue('cart_items', json_encode($cart_items), 60 * 24 * 30);
    }

    #Clear carts items form cookie
    static public function clearCartItemsFromCookie(){
        Cookie::queue(Cookie::forget('cart_items'));
    }

    #get all cart items form cookie
    static public function getCartItemsFromCookie(){
        $cart_items = json_decode(Cookie::get('cart_items'), true);

        //dd($cart_items);

        if(! $cart_items ){
            $cart_items = [];
        }

        return $cart_items;
    }

    #increment item quantity
    static public function incrementQuantityToCartItem($product_id){
        $cart_items = self::getCartItemsFromCookie();

        foreach($cart_items as $key => $item){
            if($item['product_id'] == $product_id){
                $cart_items[$key]['quantity']++;
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    #decrement item quantity
    static public function decrementQuantityToCartItem($product_id){
        $cart_items = self::getCartItemsFromCookie();

        foreach($cart_items as $key => $item){
            if($item['product_id'] == $product_id){
                if($cart_items[$key]['quantity'] > 1){
                    $cart_items[$key]['quantity']--;
                    $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
                }
            }
        }

        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    #grand Total
    static public function calculateGrandTotal($items){
        return array_sum(array_column($items, 'total_amount'));
    }
}