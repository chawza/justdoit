extends('layout.app')

@section('content')
<!-- left panel -->
<div>
    @if (user->role == 'member')
        <ul>
            <li><a href="/showcase">All Shoe</a></li>
            <li><a href="/cart">View Cart</a></li>
            <li><a href="/transactions">View Transactions</a></li>
        </ul>
    @elseif (user->role == 'admin')
        <ul>
            <li><a href="/showcase">All Shoe</a></li>
            <li><a href="/addshoe">Add Shoe</a></li>
            <li><a href="/transactions">View Transactions</a></li>
        </ul>
    @endif
</div>

<!-- main panel -->
<div>

</div>
@endsection