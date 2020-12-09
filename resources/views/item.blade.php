@extends('layouts.store')

@section('main_panel')
    <div class="row" style="padding: 2%">
        @isset($item)
        <div class="col-4">
            <img class="img-fluid" src="{{ asset('storage/img/' . $item->thumbnail) }}" alt="">
            <h5>{{ $item->name }}</h5>
            <p>Rp{{ number_format($item->price, 2, ',', '.') }}</p>
            <p>{{ $item->description }}</p>
        </div>
        @endisset
        
        <div class="col">
            <form method="POST" action="{{$post_link}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Item Name</label>
                    <input name="name" class="form-control" type="text" required>
                </div>
                <div class="form-group">
                    <label for="price">Item Price</label>
                    <input name="price" class="form-control" type="text" pattern="[0-9]{1,10}" required>
                </div>
                <div class="form-group">
                    <label for="description">Item Description</label>
                    <input name="description" class="form-control" type="text" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input name="quantity" class="form-control" type="text" required pattern="[0-9]*">
                </div>
                
                @if (isset($item))
                    <div class="form-group">
                        <label for="description">Item thumbnail image</label>
                        <input name="thumbnail" class="form-control-file" type="file">
                    </div>
                    <input type="hidden" name="item_id" value="{{$item->id}}">
                    <button id="submit-btn" type="submit" class="btn btn-primary" value="Submit">Update</button>
                @else
                    <div class="form-group">
                        <label for="description">Item thumbnail image</label>
                        <input name="thumbnail" class="form-control-file" type="file" required>
                    </div>
                    <button id="submit-btn" type="submit" class="btn btn-primary" value="Submit">Add Item</button>
                @endif
            </form>
        </div>
    </div>
@endsection
