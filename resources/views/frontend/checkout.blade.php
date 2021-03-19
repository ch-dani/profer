@extends('frontend.layouts.master')
@section('title', 'Welcome | PROREFURBLAB')
@section('css')
@endsection
@section('content')
    <div class="row offset-4 mt-3">
        <div class="col-md-6">
            <div style="width:100%" class="card" style="width: 50%;">
                <div class="card-body">
                    <h5 class="card-title">Your Order</h5>
                    <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-product-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Product Price:</label><br>
                                    <label>Discount:</label><br>
                                    <label>SubTotal:</label><br>
                                    <label>Shipping Charges:</label>
                                </div>
                                <div class="col-md-6">
                                    <label>$9586</label><br>
                                    <label>$0</label><br>
                                    <label>${{$data['total']}}</label><br>
                                    <label>${{$data['shipping']}}</label>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Total</label>
                                </div>
                                <div class="col-md-6">
                                    <label>${{$data['total']+$data['shipping']}}</label>
                                </div>

                            </div>
                        </div>
                        <div class="payment-method">
                            <h5>Payment Method</h5>
                            <div class="panel-body">
                                <p><input type="radio" id="paypal" value="Paypal" name="payment_method" checked>
                                    &nbsp;<label for="paypal"> Paypal </label></p>
                                <p><input type="radio" value="card" id="card" name="payment_method">
                                    &nbsp;<label for="card"> Credit Card
                                    </label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <a href="" class="btn btn-info float-lg-right">Place Order</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
