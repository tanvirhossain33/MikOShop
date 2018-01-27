<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Payment;
use DB;

class OrderController extends Controller
{
    public function index(){
        $orders = DB::table('orders')
                ->join('customers','orders.customerId', '=','customerId')
                ->join('payments','orders.id','=','payments.orderId')
                ->select('orders.*','customers.firstName','customers.lastName','payments.*')
                ->get();
        return view('admin.order.orderContent',['orders'=>$orders]);
    }
}
