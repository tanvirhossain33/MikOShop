@extends('frontEnd.master')
@section('title')
Checkout
@endsection

@section('mainContent')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well text-success text-center">
                Dear {{Session::get('customerName')}}, You have to give us product shipping information to complete your valuable order.
                If your billing & shipping information are same then just press on save shipping info button. 
            </div>
        </div>
    </div>
    <div class="row">
      
        <div class="col-md-8 col-md-offset-2">
            <div class="well">
                <br>
                <h3 class="text-center text-success">Shipping from here</h3>
                <hr/>
                <form class="form-horizontal" action="{{url('/new-shipping')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3">Full Name</label>
                        <div class="col-md-9">
                        <input type="text" value="{{$customerById->firstName.' '.$customerById->lastName}}" name="fullName" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Email Address</label>
                        <div class="col-md-9">
                            <input type="email" value="{{$customerById->emailAddress}}" name="emailAddress" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Phone Number</label>
                        <div class="col-md-9">
                            <input type="number" value="{{$customerById->phoneNumber}}" name="phoneNumber" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Address</label>
                        <div class="col-md-9">
                            <textarea class="form-control"  name="address" rows="8" style="resize:none;">{{$customerById->address}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Shipping Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection