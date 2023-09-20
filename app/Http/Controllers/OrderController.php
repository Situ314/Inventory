<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,staff,customer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name','ASC')
            ->get()
            ->pluck('name','id');

        $customers = Customer::get()
            ->pluck('name','id');

        if(Auth::user()->role == 'customer'){
            $customer_id = Customer::where('user_id',Auth::user()->id)->first()->id;
            $invoice_data = Order::where('customer_id', $customer_id)->get();
        }
        else{
            $invoice_data = Order::all();
        }

        return view('orders.index', compact('products','customers', 'invoice_data'));
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
    public function store(Request $request)
    {
        $this->validate($request, [
           'products'     => 'required',
           'customer_id'      => 'required',
           'qty'            => 'required',
           'order_date'       => 'required'
        ]);

        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->order_date = $request->order_date;
        $order->save();

        for ($i=0; $i < count($request->products); $i++){
            $product = Product::findOrFail($request->products[$i]);
            if($product->qty >= $request->qty[$i]){
                $product->qty -= $request->qty[$i];
                $product->save();

                $order->products()->attach($request->products[$i], ['qty' => $request->qty[$i]]);
            }else{
                return response()->json([
                    'success'    => false,
                    'message'    => 'We dont have enough stock ('. $request->qty[$i] .' units)'
                ]);
            }
        }

        return response()->json([
            'success'    => true,
            'message'    => 'Order Created'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_keluar = Order::find($id);
        return $product_keluar;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::destroy($id);

        $order->products()->detach();

        return response()->json([
            'success'    => true,
            'message'    => 'Order Deleted'
        ]);
    }



    public function apiProductsOut(){
        $product = Order::all();

        return Datatables::of($product)
            ->addColumn('products_name', function ($product){
                $products = $product->products;
                $productNames = '';
                foreach ($product->products as $prod){
                    $productNames .= $prod->name . ', ';
                }

                return $productNames;
            })
            ->addColumn('customer_name', function ($product){
                return $product->customer->name;
            })
            ->addColumn('action', function($product){
                return '<a onclick="deleteData('. $product->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['products_name','customer_name','action'])->make(true);

    }
}
