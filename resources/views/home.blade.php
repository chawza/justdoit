@extends('layouts.app')

@section('content')
<div class="row-cols-3">
    @if (!$items)
        <h1>No item in database!</h1>
    @endif
    @foreach ($items as $item)
    <div class="col mb-4">
        <div class="card">
            <img src="{{ asset('img/' . $item->thumbnail) }}" alt="{{ 'an image of ' . $item->thumbnail }}">
            <div class="card-body">
                <h5>{{ $item->name }}</h5>
                <p>Rp.{{ number_format($item->price, 2, ',', '.') }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $items->links() }}
@endsection
