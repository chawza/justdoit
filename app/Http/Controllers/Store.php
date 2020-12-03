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

    public function shoeDetail($shoe_id){
        /*
        Two things will happens depends on the user role,
            if the role is a "member", they can directly add how many item to add to the cart
            if it's an 'admin', they can update the item by clicking button that redirect them to the "updateShoeDetail" function
        */
    }

    public function addShoe($shoe_id){
        /*
        admin filling up forms that add new shoe product to cart then POST items to submitShoeDetail
        */
    }

    public function updateShoeDetail($shoe_id){
        /*
        page for admin to edit the shoe details and item availablity
        */
    }

    public function submitShoeToCart(Request $request){
        
    }

    public function submitShoeDetail(Request $request){

    }

    public function submitAddShoe(Request $request){

    }
}
