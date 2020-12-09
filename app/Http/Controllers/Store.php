<?php

namespace App\Http\Controllers;

use App\Shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Store extends Controller
{
    //
    public function storeShowCase(){
        /*
        default page after login for all member or admins

        pagination : ?
        */
        $user = Auth::user();
        $items = DB::table('shoes')->simplePaginate(9);

        return view('showcase', ['user' => $user, 'items' => $items]);
    }

    public function shoeDetail($shoe_id){
        /*
        Two things will happens depends on the user role,
            if the role is a "member", they can directly add how many item to add to the cart
            if it's an 'admin', they can update the item by clicking button that redirect them to the "updateShoeDetail" function
        */
        $user = Auth::user();
        $item = DB::table('shoes')->find($shoe_id);
        return view('shoe', ['user' => $user, 'item' => $item]);
    }

    public function addShoe(){
        /*
        admin filling up forms that add new shoe product to cart then POST items to submitShoeDetail
        */
        $post_link = '/store/addShoe';

        return view('item', ['user' => Auth::user(), 'post_link' => $post_link]);
    }

    public function updateShoeDetail($shoe_id){
        /*
        page for admin to edit the shoe details and item availablity
        */
        $item = DB::table('shoes')->find($shoe_id);
        $post_link = '/store/update';

        return view('updateItem', ['user' => Auth::user(), 'item' => $item, 'post_link' => $post_link]);
    }

    public function submitUpdateShoeDetail(Request $request){
        /*
        recieve Html form that edit the value of a shoe detail
        */
        $input = $request->input();

        #retrieve shoe object
        $shoe = Shoe::where('id',$input['item_id'])->first();
        
        #if show with id doesn't exist
        if(!$shoe){
            return redirect('store/showcase');
        }

        # remove non-item detail before updating
        unset($input['_token']);
        unset($input['item_id']);

        #edit item attribute
        foreach($input as $key => $value){
            # only update value that being filled
            if($value){
                $shoe[$key] = $value;
            }
        }

        if($request->file()){
            # delete old image
            Storage::delete('/public/img' . $shoe->thumbnail);

            # add new image
            $path = $request->file('thumbnail')->store('/public/img');
            $path = explode('/', $path);
            $shoe->thumbnail = $path[count($path)-1];
        }

        $shoe->save();

        return redirect('store/showcase');
    }

    public function submitAddShoe(Request $request){
        /*
        recieve post request from HTML form and add new item to the DB shoes table
        */
        $input = $request->input();

        # remove _token before iteration
        unset($input['_token']);

        #add item attribute
        $new_item = [];
        foreach($input as $key => $value){
            $new_item[$key] = $value;
        }

        #storing image
        $path = $request->file('thumbnail')->store('/public/img');
        $path = explode('/', $path);
        $new_item['thumbnail'] = $path[count($path)-1];

        # insert to DB
        DB::table('shoes')->insert($new_item);

        return redirect('/store/showcase');
    }

    public function searchBox(Request $request){
        /*
        shows an item that matched a query or return to store showcase.
        or return multiple items if there are more one that matched the query
        to the store showcase
        */
        $query = $request->input('query');

        $shoes = DB::table('shoes')->where('name', 'like', "%{$query}%")->paginate(9);
        if($shoes){
            if(count($shoes) > 1){
                return view('showcase', ['user' => Auth::user(), 'items' => $shoes]);
            }
            return redirect("store/shoe/{$shoes->id}");
        }
        return redirect('store/showcase');
    }
}
