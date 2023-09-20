@extends('layouts.master')

@section('top')
@endsection

@section('content')
    @if(\Auth::user()->role == 'admin')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ \App\User::count() }}</h3>

                    <p>System Users</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-secret"></i>
                </div>
                <a href="/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ \App\Category::count() }}<sup style="font-size: 20px"></sup></h3>

                    <p>Category</p>
                </div>
                <div class="icon">
                    <i class="fa fa-list"></i>
                </div>
                <a href="{{ route('categories.index') }}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ \App\Product::count() }}</h3>
                    <p>Product</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cubes"></i>
                </div>
                <a href="{{ route('products.index') }}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ \App\Customer::count() }}</h3>

                    <p>Customer</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="{{ route('customers.index') }}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
     @endif
    <div class="row">

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ (\Auth::user()->role == 'customer') ? \App\Order::where('customer_id', \App\Customer::where('user_id', \Auth::user()->id)->first()->id)->get()->count() : \App\Order::count()  }}</h3>

                    <p>Total Orders</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-basket"></i>
                </div>
                <a href="{{ route('productsOut.index') }}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div id="container" class=" col-xs-6"></div>
    </div>

@endsection

@section('top')
@endsection
