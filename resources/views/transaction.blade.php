@extends('layouts.store')

@section('main_panel')
    @foreach ($transactions as $transaction)
    <div class="row">
        <div class="tran-header">
            <h4>{{ date_format($transaction->date, 'D M Y H:i:s') }}</h4>
            <h4>Rp{{ number_format($transaction->total_price, 2, ',', '.') }}</h4>
        </div>
        <div class="row row-cols-4">
                @foreach ($transaction->items as $item)
                    <div class="col mb-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('storage/img/' . $item->thumbnail) }}" alt="An image of {{$item->thumbnail}}">
                            <div>
                                <h5 class="card-title"> {{ $item->name }}</h5>
                                <p>Rp.{{number_format($item->price, 2, ',', '.')}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    @endforeach
@endsection
