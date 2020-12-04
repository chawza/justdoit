@extends('layouts.store')

@section('main_panel')
    <div class="content-header">
        <h1>View Shoes</h1>
    </div>

    <div class="row row-cols-3">
        @foreach ($items as $item)
            <div class="card">
                <img class="card card-img" src="{{ asset('img/' . $item->thumbnail) }}" alt="An image of {{$item->thumbnail}}">
                <div>
                    <h5 class="card-title"> {{ $item->name }}</h5>
                    <p>Rp.{{number_format($item->price, 2, ',', '.')}}</p>
                </div>
            </div>
        @endforeach
        {{ $items->links() }}
    </div>
@endsection
