@extends('frontEnd.master')
@section('title')
Checkout
@endsection

@section('mainContent')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well text-success text-center">
                Dear {{Session::get('customerName')}}, You have to give us product payment information to complete your valuable order. 
            </div>
        </div>
    </div>
    <div class="row">
      
        <div class="col-md-8 col-md-offset-2">
            <div class="well">
                <br>
                <h3 class="text-center text-success">Payment from here</h3>
                <hr/>
                <form action="{{url('/new-order')}}" method="post">
                    {{ csrf_field() }}
                <table class="table">
                    <tr>
                        <th>Cash On Delivery</th>
                        <td><input type="radio" name="paymentType" value="cash"></td>
                    </tr>
                    <tr>
                        <th>Paypal</th>
                        <td><input type="radio" name="paymentType" value="paypal"></td>
                    </tr>
                    <tr>
                        <th>BKash</th>
                        <td><input type="radio" name="paymentType" value="bkash"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="btn" value="Confirm order" class="btn btn-primary btn-block"></td>
                    </tr>
                </table>
                    </form>
            </div>
        </div>
    </div>
</div>
<hr/>
@endsection