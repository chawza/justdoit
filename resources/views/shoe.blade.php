@extends('layouts.store')

@section('main_panel')
    <div class="row" style="padding: 2%">
        <div class="col-4">
            <img class="img-fluid" src="{{ asset('storage/img/' . $item->thumbnail) }}" alt="">
        </div>
        <div class="col-8">
            <h5>{{ $item->name }}</h5>
            <p>Rp{{ number_format($item->price, 2, ',', '.') }}</p>
            <p>Available : {{ $item->quantity }}</p>
            <p>{{ $item->description }}</p>

            @if ($user->role == 'admin')
            <a href="/store/update/{{ $item->id }}" class="btn btn-primary">Update</a>
            @else
                <form action="/store/shoe" method="post">
                    @csrf
                    <label for="quantity">Item Quantity</label>
                    <input type="number" name="quantity" min="1" max="{{$item->quantity}}">

                    <input type="hidden" name="item_id" value="{{$item->id}}">
                    <button type="submit" class="btn btn-primary" value="Submit">Add to Cart</button>
                </form>
            @endif
        </div>
    </div>
@endsection
