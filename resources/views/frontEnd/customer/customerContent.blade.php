@extends('frontEnd.master')
@section('title')
Checkout
@endsection

@section('mainContent')
<hr/>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="well">
                Dear {{Session::get('customerName')}},
                Your Order Successfully Post. We Will Contact With You Soon...
            </div>
        </div>
    </div> 
</div>
<hr/>
@endsection