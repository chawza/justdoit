<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    //
    protected $table = 'shoes';

    static function validate(array $query){
        /*
        validate the query before inserting into the db except the thumnail.
        return 1 if its valid, or zero
        */
        // if name and description is empty
        if (!$query['name'] || !$query['description']){
            return 0;
        }

        // check price value
        if (!$query['price'] || $query['price'] < 100){
            return 0;
        }

        return 1;
    }
}
