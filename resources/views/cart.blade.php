@extends('layouts.store')

@section('main_panel')
    <div id="content-header">
        <h1>Transaction History</h1>
    </div>

    @if ($carts)
        <div class="container">
            @foreach ($carts as $cart)
            <div class="row align-items-center" style="margin: 3% 0% 3% 0%">
                <div class="col-3">
                    <img class="img-fluid" src="{{ asset('storage/img/' . $cart->item->thumbnail) }}">
                </div>
                <div class="col-4">
                    <p>{{ $cart->item->name }}</p>
                </div>
                <div class="col-1">
                    <p>{{ $cart->quantity }}</p>
                </div>
                <div class="col-3">
                    <p>Rp{{ number_format($cart->item->price , 2, ',', '.') }}</p>
                </div>
                <div class="col-1">
                    <a class="btn btn-primary" href="/transaction/cart/{{$cart->id}}">Edit</a>
                </div>
            </div>
            @endforeach
            <form action="/transaction/cart" method="POST">
                @csrf
                <button class="btn btn-primary" type="submit" name="action" value="checkout">Checkout</button>
            </form>
        </div>
    @else
        <div class="row justify-content-center">
            <p>No item in cart</p>
        </div>
    @endif
    
@endsection
