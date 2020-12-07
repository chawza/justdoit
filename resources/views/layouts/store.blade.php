@extends('layouts.app')

@section('content')
<!-- left panel -->
<div class="row justify-content-center">
    <div class="col-md-2">
        <ul class="list-group">
            <li class="list-group-item"><a href="/store/showcase">All Shoe</a></li>
            @if ($user->role == 'member')
                <li class="list-group-item"><a href="/transaction/cart">View Cart</a></li>
            @elseif ($user->role == 'admin')
                <li class="list-group-item"><a href="/store/addShoe">Add Shoe</a></li>
            @endif
            <li class="list-group-item"><a href="/transaction/transactions">View Transactions</a></li>
        </ul>
    </div>
    
    <!-- main panel -->
    <div id="main-panel" class="col-md-6">
        @section('main_panel')
        @show
    </div>
</div>
@endsection