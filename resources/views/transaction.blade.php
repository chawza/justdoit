@extends('layouts.store')

@section('main_panel')
    <div id="content-header">
        @if ($user->role == 'member')
            <h1>{{$user->name}}'s Transaction History</h1>
        @else
            <h1>Transaction History</h1>
        @endif
        
    </div>
    <div class="container">
        @foreach ($transactions as $transaction)
        <div class="row">
            <div class="col-8">
                <h5>{{ date_format($transaction->date, 'd-m-Y H:i:s') }}</h5>
            </div>
            <div class="col-4" style="text-align: end">
                <h4>Rp{{ number_format($transaction->total_price, 2, ',', '.') }}</h4>
            </div>
        </div>
        <div class="row row-cols-4">
            @foreach ($transaction->items as $item)
                <div class="col mb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/img/' . $item->thumbnail) }}" alt="An image of {{$item->thumbnail}}">
                        <div>
                            <h5 class="card-title"> {{ $item->name }}</h5>
                            <p>Rp.{{number_format($item->price, 2, ',', '.')}} x {{ $item->num_items }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endforeach
    </div>
@endsection
