<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    protected $table = 'Cart';

    protected $fillable = ['user_id', 'shoe_id', 'quantity'];

    static function add_validation(array $query){
        /*
        validate cart query before adding it to the DB

        return True if its valid, or return null
        */
        $item = DB::table('shoes')->find($query['shoe_id']);

        # validate user existance
        if(!DB::table('users')->find($query['user_id'])){
            return 0;
        }
        # validate item id
        if(!$item){
            return 0;
        }

        # validate item quantity
        $add_quantity = $query['quantity'];
        if($add_quantity > $item->quantity || $add_quantity <= 0){
            return 0;
        }

        # validate the quantity if the same item has been added to the cart
        $cart = DB::table('cart')->where('shoe_id', $item->id)->first();
        if($cart){
            if($cart->quantity + $add_quantity > $item->quantity){
                return 0;
            }
        }

        return 1;
    }

    static function validate_transaction(array $carts){
        /*
        validate if transaciton can be made by checking it individulaity
        */
        foreach($carts as $cart){
            $item = Shoe::find($cart->shoe_id);
            if(!$item){
                return 0;
            }

            if($cart->quantity > $item->quantity){
                return 0;
            }
        }

        return 1;
    }
}
