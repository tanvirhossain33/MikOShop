<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;
use App\Shipping;
use App\Order;
use App\Payment;
use App\orderDetails;
use Cart;

class CheckoutController extends Controller {

    public function index() {
        return view('frontEnd.checkout.checkoutContent');
    }
    public function newCustomer(Request $request){
        $customer = new Customer();
        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->emailAddress = $request->emailAddress;
        $customer->password = bcrypt($request->password);
        $customer->phoneNumber = $request->phoneNumber;
        $customer->address = $request->address;
        $customer->save();
        Session::put('customerId', $customer->id);
        Session::put('customerName', $customer->firstName . ' ' . $customer->lastName);
        return redirect('/shipping-info');
    }

    public function shippingInfo() {
        $customerId = Session::get('customerId');
        $customerById = Customer::find($customerId);
        return view('frontEnd.checkout.shippingInfoContent', ['customerById' => $customerById]);
    }

    public function userLogout() {
        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/');
    }

    public function newShipping(Request $request) {
        $shipping = new Shipping();
        $shipping->fullName = $request->fullName;
        $shipping->emailAddress = $request->emailAddress;
        $shipping->phoneNumber = $request->phoneNumber;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId', $shipping->id);
        return redirect('/payment-info');
    }

    public function paymentInfo() {
        return view('frontEnd.checkout.paymentInfoContent');
    }

    public function saveOrderInfo(Request $request) {
        $paymentType = $request->paymentType;
        $order = new Order();
            $order->customerId = Session::get('customerId');
            $order->shippingId = Session::get('shippingId');
            $order->orderTotal = Session::get('orderTotal');
            $order->save();
            Session::put('orderId', $order->id);
            $payment = new Payment();
            $payment->orderId = Session::get('orderId');
            $payment->paymentType = $paymentType;
            $payment->save();
            
            
            $orderDetail = new orderDetails();
            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail->orderId = Session::get('orderId');
                $orderDetail->productId = $cartProduct->id;
                $orderDetail->productName = $cartProduct->name;
                $orderDetail->productPrice = $cartProduct->price;
                $orderDetail->productQuantity = $cartProduct->qty;
                $orderDetail->save();
            }
        
        if ($paymentType == 'cash') {
          
            return redirect('/customer-home');
        } else if ($paymentType == 'paypal') {
            return view('frontEnd.paypal');
        } else if ($paymentType == 'bkash') {
            return 'bkash';
        }
    }

    public function userLogin(Request $request) {
        $emailAddress = $request->emailAddress;
        $customerByEmail = Customer::where('emailAddress', $emailAddress)->first();
        $exitingPassword = $customerByEmail->password;
        if (password_verify($request->password, $exitingPassword)) {
            Session::put('customerId', $customerByEmail->id);
            Session::put('customerName', $customerByEmail->firstName . ' ' . $customerByEmail->lastName);
            return redirect('/shipping-info');
        } else {
            return redirect('/checkout')->with('message', 'Email or Password is not valid');
        }
    }

}
