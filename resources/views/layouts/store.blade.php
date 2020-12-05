@extends('layouts.app')

@section('content')
<!-- left panel -->
<div class="row">
    <div class="col-md-2">
        <ul class="list-group">
            <li class="list-group-item"><a href="/store/showcase">All Shoe</a></li>
            @if ($user->role == 'member')
                <li class="list-group-item"><a href="/transaction/cart">View Cart</a></li>
            @elseif ($user->role == 'admin')
                <li class="list-group-item"><a href="/store/addshoe">Add Shoe</a></li>
            @endif
            <li class="list-group-item"><a href="/transaction/transactions">View Transactions</a></li>
        </ul>
    </div>

    <!-- main panel -->
    <div class="col-md-8">
        @section('main_panel')
        @show
    </div>
</div>
@endsection