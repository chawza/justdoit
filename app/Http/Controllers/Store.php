<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Store extends Controller
{
    //
    public function storeShowCase(){
        /*
        default page after login for all member or admins

        pagination : ?
        */
    }

    public function shoeDetail(){
        /*
        Two things will happens depends on the user role,
            if the role is a "member", they can directly add how many item to add to the cart
            if it's an 'admin', they can update the item by clicking button that redirect them to the "updateShoeDetail" function
        */
    }

    #potential function to split to new controller
    public function cartlistDetail(){
        /*
        review all items on the cart that has been added
        or
        edit the cart by removing or edit the quantity
        */
    }

    public function addShoe(){
        /*
        admin filling up forms that add new shoe product to cart then POST items to submitShoeDetail
        */
    }

    public function updateShoeDetail(){
        /*
        page for admin to edit the shoe details and item availablity
        */
    }

    #potential function to split to new controller
    public function viewTransactions(){
        /*
        if the user is a member, it will show all past transaction that has been made

        if the user is an admin, it will show all recent transactions has been made by all user


        pagination : ?
        */
    }
}
