<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Shoe;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Transactions extends Controller
{
    public function cartlistDetail(){
        /*
        review all items on the cart that has been added
        or
        edit the cart by removing or edit the quantity
        */
    }

    public function cartItemDetail(){
        /*
        page for editing item quantity on cart
        */
    }

    public function submitShoeToCart(Request $request){
        /*
        recieve post from user to add an item to their cart and its quantity
        */
        $input = $request->input();
        $user = Auth::user();
        $item_id = $input['item_id'];
        $quantity = $input['quantity'];

        $query = [
            'user_id' => $user->id,
            'shoe_id' => $item_id,
            'quantity' => $quantity,
        ];

        if(Cart::validate($query)){
            return view('/store/shoe/' . $item_id);
        }else{
            // find whether the same item is in the cart. if so, append it
            $cart = Cart::where([
                'user_id' => $user->id,
                'shoe_id' => $item_id,
            ])->first();
            
            if($cart){
                $cart->quantity += $quantity;
                $cart->save();
            }else{
                $new_cart = new Cart($query);
                $new_cart->save();
            }

            $item = Shoe::find($item_id);
            $item->quantity -= $quantity;
            $item->save();
        }
    
        return redirect('/store/showcase');
    }

    public function viewTransactions(){
        /*
        if the user is a member, it will show all past transaction that has been made

        if the user is an admin, it will show all recent transactions has been made by all user


        pagination : ?
        */

        # get transaction based on role
        $transactions = [];
        $user = Auth::user();
        if ($user->role == 'member'){
            $transactions = DB::table('transactions')->where('user_id', $user->id)
            ->get();
        }
        else {
            $transactions = DB::table("transactions")->get();
        }

        $tran = [];
        foreach ($transactions as $transaction){
            $transaction_details = DB::table('transaction_detail')->
            where('transaction_id', $transaction->id)->get();

            $curr_tran = (Object)[];

            # get total price
            $total_price = 0;
            foreach ($transaction_details as $detail){
                $total_price += ($detail->price * $detail->num_items);
            }
            $curr_tran->total_price = $total_price;

            #get transacaiton date
            $curr_tran->date = new DateTime($transaction->created_at); 

            #get all transactions items
            $items = [];
            foreach ($transaction_details as $detail){
                $item = DB::table('shoes')->find($detail->shoe_id);
                $item->num_items = $detail->num_items;
                array_push($items, $item);
            }
            $curr_tran->items = $items;

            #append transactions array
            array_push($tran, $curr_tran);
        }

        return view('transaction', ['user'=>$user, 'transactions'=>$tran]);
    }

    public function checkOut(Request $request){

    }

    public function updateCartDetail(Request $request){

    }
}
