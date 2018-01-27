@extends('admin.master')

@section('content')
<hr/>
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
<hr/>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>SL No</th>
            <th>Order Id</th>
            <th>Customer Name</th>
            <th>Order Total</th>
            <th>Order Status</th>
            <th>Payment Type</th>
            <th>Payment Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1?>
      @foreach($orders as $order)
      <tr class="odd gradeX">
            <td>{{ $i }}</td>
            <td>{{$order->id}}</td>
            <td>{{$order->firstName.' '.$order->lastName}}</td>
            <td>{{$order->orderTotal}}</td>
            <td>{{$order->orderStatus}}</td>
            <td>{{$order->paymentType}}</td>
            <td>{{$order->paymentStatus}}</td>
            <td>
                <a href="#" class="btn btn-info" title="Order View">
                    <span class="glyphicon glyphicon-info-sign"></span>
                </a>
                <a href="#" class="btn btn-success" title="Order Invoice"                                        e">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="#" class="btn btn-success btn-sm" title="Download">
                    <span class="glyphicon glyphicon-download"></span>
                </a>
                <a href="#" class="btn btn-success" title="Order Edit">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="#" class="btn btn-danger" title="Order Delete">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
        </tr>
        <?php $i++ ?>
        @endforeach
    </tbody>
</table>
@endsection
