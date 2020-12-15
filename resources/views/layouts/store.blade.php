@extends('layouts.app')

@section('content')
<!-- left panel -->
<div class="row justify-content-center">
    <div class="col-md-2">
        <ul class="list-group">
            <li class="list-group-item"><a href="/store/showcase">All Shoe</a></li>
            @auth
            @if ($user->role == 'member')
                <li class="list-group-item"><a href="/cart">View Cart</a></li>
            @elseif ($user->role == 'admin')
                <li class="list-group-item"><a href="/store/addShoe">Add Shoe</a></li>
            @endif
            <li class="list-group-item"><a href="/transaction">View Transactions</a></li>
            @endauth
        </ul>
    </div>
    
    <!-- main panel -->
    <div id="main-panel" class="col-md-6">
        @section('main_panel')
        @show
    </div>
</div>
@endsection