@extends('layout.front.app')

@section('content')
        <div class="container product-in-cart-list">
            @if(true)
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Cart</li>
                        </ol>
                    </div>
                    <div class="col-md-12 content">
                        <div class="box-body">
                            @include('layouts.errors-and-messages')
                        </div>
                        <h3><i class="fa fa-cart-plus"></i> Shopping Cart</h3>
                        <table class="table table-striped">
                            <thead>
                                <th class="col-md-2 col-lg-2">Cover</th>
                                <th class="col-md-2 col-lg-2">Name</th>
                                <th class="col-md-2 col-lg-2">Price</th>
                                <th class="col-md-2 col-lg-2">Action</th>                                
                            </thead>
                            <tbody>
                            @foreach($carts as $cart)
                                <tr>
                                    <td>
                                        <img src="{{ $cart -> game -> cover }}"  class="img-responsive img-thumbnail">
                                    </td>
                                    <td>
                                        {{ $cart -> game -> name }}
                                    </td>
                                    <td>
                                        {{ $cart -> game -> price }}
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.update' , $cart -> id) }}" class="form-inline" method="post">
                                            {{ csrf_field() }}
                                            @method('put')
                                            <div class="input-group">
                                                <input type="text" name="quantity" value="{{ $cart -> quantity }}" class="form-control" />
                                                <span class="input-group-btn"><button class="btn btn-default">Update</button></span>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.destroy' , $cart -> id ) }}" method="post">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        </form>
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right">
                                    <a href="{{ route('home') }}" class="btn btn-default">Continue shopping</a>
                                    <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout with Alipay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <p class="alert alert-warning">No products in cart yet. <a href="{{ route('home') }}">Shop now!</a></p>
                    </div>
                </div>
            @endif
        </div>
@endsection
@section('css')
    <style type="text/css">
        .product-description {
            padding: 10px 0;
        }
        .product-description p {
            line-height: 18px;
            font-size: 14px;
        }
    </style>
@endsection