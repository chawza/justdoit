@extends('layouts.store')

@section('main_panel')
    <div class="content-header">
        <h1>View Shoes</h1>
    </div>

    <div class="row row-cols-3">
        @foreach ($items as $item)
            <div class="col mb-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('storage/img/' . $item->thumbnail) }}" alt="An image of {{$item->thumbnail}}">
                    <div>
                        <h5 class="card-title">
                            <a href="/store/shoe/{{ $item->id }}" class="stretched-link">
                                {{ $item->name }}
                            </a>
                        </h5>
                        <p>Rp{{number_format($item->price, 2, ',', '.')}}</p>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $items->links() }}
    </div>
@endsection
