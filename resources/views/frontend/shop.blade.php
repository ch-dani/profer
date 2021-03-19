@extends('frontend.layouts.master')
@section('title','shop')

@section('content')
  <div class="container">
        <div class="row">
            @foreach($cats as $cat)
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="productCardContainer">
                            <div class="productCardContent">
                                <div class="productCardImage">
                                    <img src="{{asset('uploads/productImages/'.$cat->prod->image1)}}" alt="" />
                                    <a href="" class="imageCardEffect">Product</a>
                                </div>

                                <div class="productCardDetails">
                                    <div class="productCardModel">
                                        <span class="modelCardEffect"></span>
                                        <a href="">
                                            {{$cat->prod->name}}
                                            <span>${{$cat->prod->price}}</span>
                                        </a>
                                    </div>
                                    <div class="productCardDetailsList">
                                        <div class="list-group">
                                            <a href="" class="list-group-item">
                                                <span class="detailIcon">
                                                    <i class="fa fa-dot-circle-o"></i>
                                                </span>
                                                <span class="detailInfo">
                                                    Very annoying & rude
                                                </span>
                                            </a>
                                            <a href="" class="list-group-item">
                                                <span class="detailIcon">
                                                    <i class="fa fa-dot-circle-o"></i>
                                                </span>
                                                <span class="detailInfo">
                                                    Describes himself as a genius, but he is mentally retarded
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="productCardPrice">
                                        {{-- <a href="" class="btn">
                                            <i class="fa fa-info"></i> More Details
                                        </a> --}}
                                        <button class="btn addInCart text-center outline-danger" id="" value="{{$cat->prod->id}}">
                                            <i class="fa fa-shopping-cart"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
  

    
@endsection
