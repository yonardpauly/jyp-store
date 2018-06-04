<?php

namespace App\Http\Controllers;

use App\Checkout;
use App\GuestCart;
use App\SalesTransaction;
use Session;
use \Auth;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCheckout()
    {
        $guestCart = Session::get('cart');
        $cart = new GuestCart($guestCart);
        $trans_date = date('Y-m-d');
        $order_code = date('now') . Auth::user()->id . $cart->totalQty . $cart->totalPrice;
        // dd($order_code);
        $user_email = Auth::user()->email;
        $cartItems = $cart->items;
        $totalQty = $cart->totalQty;
        $totalPrice = $cart->totalPrice;
        $user_id = Auth::user()->id;
        // dd($items);
        $items = [];
        foreach ($cartItems as $key => $value) {
            $items[$key] = implode('~', $value);
        }
        $new = implode(',', $items);
        // dd($new);
        // $itemName = $data[0]['item'][0]['name'];
        // $itemName = $data[0]['item'][0]['name'];
        // dd($itemName);

        $stData = new SalesTransaction;
        $stData->transaction_date = $trans_date;
        $stData->order_code = $order_code;
        $stData->customer_email = $user_email;
        $stData->items = $new;
        $stData->sold_quantity = $totalQty;
        $stData->total_amount = $totalPrice;
        $stData->user_id = $user_id;
        // dd($stData);
        $result;
        if (Auth::check() && $stData->save()) {
            $result = redirect()->route('shop.index')->with('orderSuccess', 'Your order has been successfuly submitted. Your order code is '. $order_code);
        } else {
            $result = redirect()->route('shop.checkout')->with('orderError', 'Something went wrong when processing your order, please try again.');
        }
        // dd($result);
        Session::forget('cart');
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
