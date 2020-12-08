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
        if($query['quantity'] > $item->quantity || $query['quantity'] <= 0){
            return 0;
        }

        return 1;
    }
}
