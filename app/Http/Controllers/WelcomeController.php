<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Customer;
use Session;
use App\Product;
use App\Category;



class WelcomeController extends Controller
{
    public function index(){
        $publishedProducts =Product::where('publicationStatus',1)->get();
        
    	return view('frontEnd.home.homeContent',['publishedProducts'=>$publishedProducts]);
    }

    public function category($id){
        $publishedCategoryProducts = Product::where('categoryId',$id)
                ->where('publicationStatus',1)
                ->get();
        return view('frontEnd.category.categoryContent',['publishedCategoryProducts'=>$publishedCategoryProducts]);
    }

    public function productDetalis($id){
        $productById = Product::where('id',$id)->get();
    	return view('frontEnd.product.productContent',['productById'=>$productById]);
    }
     public function contact(){
        return view('frontEnd.contact.contactContent');
    }

    public function login(){
        return view('frontEnd.user.userLoginContent');
    }
    public function newLogCustomer(Request $request) {
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
        return redirect('/');
    }
    
    public function userLogout() {
        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/');
    }
    
    public function userLogin(Request $request) {
        $emailAddress = $request->emailAddress;
        $customerByEmail = Customer::where('emailAddress', $emailAddress)->first();
        $exitingPassword = $customerByEmail->password;
        if (password_verify($request->password, $exitingPassword)) {
            Session::put('customerId', $customerByEmail->id);
            Session::put('customerName', $customerByEmail->firstName . ' ' . $customerByEmail->lastName);
            return redirect('/');
        } else {
            return redirect('/userLogin')->with('message', 'Email or Password is not valid');
        }
    }
    
}
