@extends('layouts.store')

@section('main_panel')
    <div class="row" style="padding: 2%">
        <div class="col-4">
            <img class="img-fluid" src="{{ asset('storage/img/' . $item->thumbnail) }}" alt="">
        </div>
        <div class="col-8">
            <h5>{{ $item->name }}</h5>
            <p>Rp{{ number_format($item->price, 2, ',', '.') }}</p>
            <p>Available : {{$item->quantity}}</p>
            <p>{{ $item->description }}</p>

            <form action="/transaction/cart/update" method="post">
                @csrf
                <label for="quantity">Item Quantity</label>
                <input type="number" name="quantity" min="1" max="{{$item->quantity}}" value="{{$cart->quantity}}">

                <input type="hidden" name="cart_id" value="{{$cart->id}}">
                <div>
                    <button name="action" type="submit" class="btn btn-primary" value="update">update</button>
                    <button name="action" type="submit" class="btn btn-primary" value="remove">delete</button>
                </div>
            </form>
        </div>
    </div>
@endsection
