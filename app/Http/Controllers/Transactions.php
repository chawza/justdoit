<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Transactions extends Controller
{
    public function viewTransactions(){
        /*
        if the user is a member, it will show all past transaction that has been made

        if the user is an admin, it will show all recent transactions has been made by all user


        pagination : ?
        */
    }

    public function cartlistDetail(){
        /*
        review all items on the cart that has been added
        or
        edit the cart by removing or edit the quantity
        */
    }
}
