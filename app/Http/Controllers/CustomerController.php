<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Customer as UserCustomer;
use App\Models\Message;
use App\Models\OrderProducts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Scalar\String_;
use Stripe\Charge;
use Stripe\Checkout\Session;
use Stripe\Customer;
use Stripe\Stripe;
use Stripe\Token;

class CustomerController extends Controller
{
        /**
     * Display a listing of the items in cart.
     */
    public function cart()
    {
        // $cart_items=Cart::where('user_id',Auth::user()->id)->get();
        // $cart_items->load('product');
        
        return view('front.cart');
    }

    public function wishlist()
    {
        
       
        return view('front.wishlist');
        
    }
    /**
     * Display a listing of the resource.
     */
    public function add_to_cart(Request $request, Product $product)
    {
        $custom=$request->all();
        array_splice($custom,0,1);
        array_splice($custom,0,1);
        array_pop($custom);

        

        if(!in_array($product->id,Auth::user()->cart->unique('product_id')->pluck('product_id')->toArray())){
            $cart=new Cart();
        
            $cart->product_id=$product->id;
            $cart->user_id=Auth::user()->id;
            $cart->quantity=$request->quantity;
            if($cart->size){
                $cart->size=$request->size;
            }
            $cart->customization=json_encode($custom);
            
            $cart->save();
    
        }
        return redirect()->route('cart');
    }

    public function add_to_wishlist(Request $request, Product $product)
    {
        $items=Wishlist::where('user_id',(Auth::user()->id))->pluck('product_id')->toArray();//dd($items);
        if(!in_array($product->id,$items)){
            $wishlist=new Wishlist();
        
            $wishlist->product_id=$product->id;
            $wishlist->user_id=Auth::user()->id;
            $wishlist->save();
        }
        return redirect()->route('wishlist');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();

        return back();
    } 
    public function destroy_wishlist(Wishlist $wishlist)
    {
        $wishlist->delete();

        return back();
    }

    public function checkout ()  {
        return view('front.checkout');
    }

    public function store_order(StoreOrderRequest $request) 
    {
        $total=0;
        foreach(Auth::user()->cart as $cart_item){
            $flag=0;
            if(isset($cart_item->customization)){
                $arr=json_decode($cart_item->customization, TRUE);
                if(in_array('dupatta',$arr)){
                    $flag=60;
                }
            }
            $total+=$cart_item->product->selling_price*$cart_item->quantity+($flag / 100) *$cart_item->product->selling_price; 
        }

        $order=new Order();
        $order->status_message='Order Placed';
        $order->payment_mode='Stripe';
        $order->user_id=Auth::user()->id;
        $order->total_amount=$total;
        $order->tracking_no	=rand();
        $order->save();

        $customer=new UserCustomer;
        $customer->address=$request->address;
        $customer->country=$request->country;
        $customer->city=$request->city;
        $customer->phone=$request->phone;
        $customer->user_id=Auth::user()->id;
        $customer->order_id=$order->id;
        $customer->save();



        foreach(Auth::user()->cart as $cart_item){
            $flag=0;
            if(isset($cart_item->customization)){
                $arr=json_decode($cart_item->customization, TRUE);
                if(in_array('dupatta',$arr)){
                    $flag=60;
                }
            }

            $order_product=new OrderProducts;
            $order_product->product_id=$cart_item->product->id;
            $order_product->order_id=$order->id;
            $order_product->quantity=$cart_item->quantity;
            $order_product->price=$cart_item->product->selling_price+($flag / 100) *$cart_item->product->selling_price;
            $order_product->customization=$cart_item->customization;
            if($cart_item->size){
                $order_product->size=$cart_item->size;
            }
            $order_product->save();
            $cart_item->delete();

        }
          return redirect()->route('customer.details');
        
    }

    public function details()  {
        return view('front.details');
    }

    public function order_payment (Order $order)  {
        
        return view('front.stripe',compact('order'));
    }

    public function payment(Request $request, Order $order) {
        //dd($request->all());
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $me=$request->now;
        $expirydate=Carbon::createFromDate($request->year,$request->expiry )->format('mY');
        $request->request->add(['expirydate' => $expirydate]); //add request

        $validatedData = $request->validate([
            "name" => 'required|max:12',
            "card_number" => 'required|max:16',
            "cvc" => 'required|max:3',
            "expirydate" => 'required|date_format:mY|after:me',
            "year" => 'required',
        ]);
        $token = Token::create(
            array(
                    "card" => array(
                    "name" => $request['name'],
                    "number" => '4242424242424242',
                    "exp_month" => $request['expiry'],
                    "exp_year" => $request['year'],
                    "cvc" => $request['cvc_number']
                )
            )
        );
        $customer = Customer::create(array(
            'email' => Auth::user()->email,
            'name' => $request->name,
            'source'  => $token
        ));
        
        $charge = Charge::create(array(
            'customer' => $customer->id,
            'amount'   => $order->total_amount*100,
            'currency' => 'usd',
            "description" => "Test payment from boutique.com.", 
            "receipt_email"=>Auth::user()->email
        ));
        if($charge['status'] == 'succeeded') {

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->user_id = Auth::user()->id;
            $payment->type = "card";
            $payment->charge_id = $charge['id'];
            $payment->amount = $order->total_amount;
            $payment->save();
            $order->status_message='Paid';
            $order->save();

        return redirect()->route('customer.details')->with('message', 'Payment Successful!');
    }
    else{
        return redirect()->route('customer.details')->with('message', 'Payment not Successful!');

    }


        
    }

    function payment_reciept(Payment $payment)  {
        $payment->load('user', 'order');

        return view('front.receipt', compact('payment'));   
     }
        public function store(Request $request)
        {
            //dd($request->all());
            $validatedData = $request->validate([
                "first_name" => 'required',
                "last_name" => 'required',
                "email" => 'required',
                "phone" => 'required',
                "message" => 'required',
            ]);
    
            $contact_us = new Message();
            $contact_us->first_name = $request->input('first_name');
            $contact_us->last_name = $request->input('last_name');
            $contact_us->phone = $request->input('phone');
            $contact_us->email = $request->input('email');
            $contact_us->message = $request->input('message');
    
            $contact_us->save();
            return redirect()->back()->with('message', 'Your Message has been successfully submitted! Have a Good Day');   
    
        }
    

}
