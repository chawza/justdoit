@extends('layouts.store')

@section('main_panel')
    <div class="row">
        @isset($item)
        <div class="col-4">
            <img class="img-fluid" src="{{ asset('storage/img/' . $item->thumbnail) }}" alt="">
            <h5>{{ $item->name }}</h5>
            <p>Rp{{ number_format($item->price, 2, ',', '.') }}</p>
            <p>{{ $item->description }}</p>
        </div>
        @endisset
        
        <div class="col-8">
            @isset($item)
                <p>Empty attribute will not effect database</p>
            @endisset
            <form method="POST" action="{{$post_link}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Item Name</label>
                    <input name="name" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="price">Item Price</label>
                    <input name="price" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="description">Item Description</label>
                    <input name="description" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input name="quantity" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="description">Item thumbnail image</label>
                    <input name="thumbnail" class="form-control-file" type="file">
                </div>
                <button id="submit-btn" type="submit" class="btn btn-primary" value="Submit">
                    @if (isset($item))
                        Update
                    @else
                        Add new Shoes
                    @endif
                </button>
            </form>
        </div>
    </div>
@endsection
