@extends('frontEnd.master')
@section('title')
Checkout
@endsection

@section('mainContent')
<hr/>
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
<hr/>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well text-success text-center">
                You have to login to complete your valuable oder.IF you are not registered than please register first.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="well">
                <br>
                <h3 class="text-center text-success">You may Login from here</h3>
                <hr/>
                <form class="form-horizontal" action="{{url('/user-login')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3">Email Address</label>
                        <div class="col-md-9">
                            <input type="email" name="emailAddress" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Login"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="well">
                <br>
                <h3 class="text-center text-success">You may Register from here</h3>
                <hr/>
                <form class="form-horizontal" action="{{url('/new-customer')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3">First Name</label>
                        <div class="col-md-9">
                            <input type="text" name="firstName" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" name="lastName" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Email Address</label>
                        <div class="col-md-9">
                            <input type="email" name="emailAddress" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Phone Number</label>
                        <div class="col-md-9">
                            <input type="number" name="phoneNumber" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Address</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="address" rows="8" style="resize:none;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Registration"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection