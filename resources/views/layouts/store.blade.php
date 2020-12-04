@extends('layouts.app')

@section('content')
<!-- left panel -->
<div class="row">
    <div class="col-md-2">
        @if ($user->role == 'member')
            <ul>
                <li><a href="/showcase">All Shoe</a></li>
                <li><a href="/cart">View Cart</a></li>
                <li><a href="/transactions">View Transactions</a></li>
            </ul>
        @elseif ($user->role == 'admin')
            <ul>
                <li><a href="/showcase">All Shoe</a></li>
                <li><a href="/addshoe">Add Shoe</a></li>
                <li><a href="/transactions">View Transactions</a></li>
            </ul>
        @endif
    </div>

    <!-- main panel -->
    <div class="col-md-8">
        @section('main_panel')
        @show
    </div>
</div>
@endsection