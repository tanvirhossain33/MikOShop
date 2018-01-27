@extends('frontEnd.master')
@section('title')
Cart
@endsection

@section('mainContent')

<div class="checkout">
    <div class="container">
        <h3>My Shopping Bag</h3>
        <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Item Total</th>
                    </tr>
                </thead>
                <?php $total = 0 ?>
                @foreach($cartProducts as $cartProduct)
                <tr>
                    <td>
                        <a href="{{url('/remove-cart-product/'.$cartProduct->rowId)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this');">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                    <td>{{$cartProduct->name}}</td>
                    <td>
                        <form class="" method="POST" action="{{url('/update-cart')}}">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="number" class="form-control" min="1"value="{{$cartProduct->qty}}" name="productQuantity"/>
                                <input type="hidden" value="{{$cartProduct->rowId}}" name="rowId"/>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-ok-sign"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </td>
                    <td>Tk {{$cartProduct->price}}</td>
                    <td>Tk {{$itemTotal = $cartProduct->price*$cartProduct->qty}}</td>
                </tr>
                <?php $total = $total + $itemTotal ?>
                @endforeach 



                <!--quantity-->
                <script>
                    $('.value-plus').on('click', function () {
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) + 1;
                        divUpd.text(newVal);
                    });

                    $('.value-minus').on('click', function () {
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) - 1;
                        if (newVal >= 1)
                            divUpd.text(newVal);
                    });
                </script>
                <!--quantity-->
            </table>
        </div>
        <div class="checkout-left">	

            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
                <?php
                $customerId = Session::get('customerId');
                $shippingId = Session::get('shippingId');
                if ($customerId != null && $shippingId != null) {
                    ?>
                    <a href="{{url('/payment-info')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>

                <?php } else if ($customerId != null && $shippingId == null) { ?>
                    <a href="{{url('/shipping-info')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
                <?php } else { ?>
                    <a href="{{url('/checkout')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
                <?php } ?>
            </div>
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                <h4>Shopping basket</h4>
                <ul>
                    <li>Total<i>-</i> <span>TK. {{$total}}</span></li>
                    <?php
                    Session::put('orderTotal', $total);
                    ?>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>	











@endsection