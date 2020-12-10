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
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();
        
        $cart_items = [];
        foreach ($carts as $cart){
            $cart->item = Shoe::find($cart->shoe_id);
            array_push($cart_items, $cart);
        }
        return view('cart', ['user' => $user, 'carts' => $cart_items]);
    }

    public function  cartDetail(Request $request, $cart_id){
        /*
        page for editing item quantity on cart
        */
        $cart = DB::table('cart')->find($cart_id);

        if(!$cart){
            // cart with id does not exist
            return redirect('transaction/cart');
        }

        $item = Shoe::find($cart->shoe_id);
        if(!$item){
            //item on t ransaction detail does not exist
            return redirect('transaction/cart');
        }
        return view('cartDetail', ['user' => Auth::user(), 'cart' => $cart, 'item' => $item]);
    }

    public function updateCartDetail(Request $request){
        /*
        update the quantity of item on the cart or remove it
        */
        $input = $request->input();
        
        $cart = Cart::find($input['cart_id']);

        if($input['action'] == 'remove'){
            $cart->delete();
            return redirect('transaction/cart');
        }
        
        $cart->quantity = $input["quantity"];

        # delete the cart its empty
        if($cart->quntity <= 0){
            $cart->delete();
        }

        $cart->save();
        
        return redirect('transaction/cart');
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

        if(!Cart::add_validation($query)){
            return redirect('store/shoe/' . $item_id);
        }else{
            // find whether tfix he same item is in the cart. if so, append it
            $cart = Cart::where([
                'user_id' => $user->id,
                'shoe_id' => $item_id,
            ])->first();
            
            if($cart){
                $cart->quantity += $quantity;
                $cart->save();
            }else{
                $new_cart = new Cart($query);
                if($new_cart->quantity <= 0){
                    # don't let add to cart if the value is zero
                    return redirect('/store/showcase');
                }
                $new_cart->save();
            }
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
}
