<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Session;
class KitchenProduct extends Controller
{
    //
    function index(){
        $data = Product::all();
        return view('product',['products'=>$data]);
    }

    function detail($id){
        $data = Product::find($id);
        return view('detail',['producted'=>$data]);
    }

    function addToCart(Request $requ){
        if($requ->session()->has('user'))
        {
            $cart= new Cart;
            $cart->user_id=$requ->session()->get('user')['id'];
            $cart->product_id=$requ->product_id;
            $cart->save();
            return redirect('/');
        }
        else{
            return redirect('/login');
        }
    }

    static function cartItem(){
        $userId=Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }

    function cartList(){
        if(session()->has('user'))
        {
            $userID=Session::get('user')['id'];
            $products=DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userID)
            ->select('products.*','cart.id as cart_id')
            ->get();

            return view('cartList',['products'=>$products]);
        } else
        {
            return redirect('/login');
        }
    }

    function removeCart($id){
        Cart::destroy($id);
        return redirect('cartList');
    }

    function order(){

        
        $userID=Session::get('user')['id'];
        $total = $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userID)
        ->sum('products.price');
        

        return view('order',['total'=>$total]);
    }
    function ordered(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'payment' => 'required',
        ]);

        $userID=Session::get('user')['id'];
        $all = Cart::where('user_id',$userID)->get();
        foreach($all as $cart)
        {
            $order = new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status='pending';
            $order->payment_method=$request->payment;
            $order->payment_status='pending';
            $order->address=$request->address;
            $order->save();
            Cart::where('user_id',$userID)->delete();
        }
        return redirect('/');
    }

    function meroOrder(){
        if(session()->has('user'))
        {
            $userID = Session::get('user')['id'];
            $orders = DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->where('orders.user_id',$userID)
            ->get();
            

            return view('meroOrder',['orders'=>$orders]);
        }else
        {
            return redirect('/login');
        }
    }
}
