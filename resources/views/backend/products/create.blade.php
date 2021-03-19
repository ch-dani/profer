@extends('backend.layouts.app')

@section('css')

@endsection


{{-- main content portion is started --}}
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Products</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div id="wrapper-content" class="wrapper-content pb-13 pt-8">
            <div class="container">

                <div id="submit-listing" class="section-submit-listing pb-2">

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-body">

                            <h2 style="text-align:center">Choose Category Hierarchies

                            </h2>

                            <button type="button" class="btn btn-info btn-sm float-right mb-2" id="add-more-product-clone"
                                style="position: absolute; right: 1%; top: 30px;"><i class="fa fa-plus"></i></button>
                            @if ($errors->any())
                                <div class="alert alert-danger col-md-12">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success col-md-12">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            @if (Session::has('danger'))
                                <div class="alert alert-danger col-md-12">
                                    {{ Session::get('danger') }}
                                </div>
                            @endif



                            <!-- product hierarchy -->
                            <section id="hierarchy_section">
                                <div class="row">
                                    <div class="col-lg-6 mainMenuCls">
                                        <div class="form-group mb-4 shouldBeCloned">
                                            <div class="mb-2 d-flex align-items-center lh-15">
                                                <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" for="name">Main Menu</label>
                                            </div>
                                            <select type="text" class="form-control mainMenuVal" name="category_id[]">
                                                <option value="" disabled selected>Select Main Menu</option>
                                                @foreach($mainManues as $mainMenu)
                                                    <option value="{{$mainMenu->id}}">{{$mainMenu->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 brandsCls"></div>
                                    <div class="col-lg-6 subBrandsCls"></div>
                                    <div class="col-lg-6 modelsCls"></div>
                                </div>
                            </section>



                           <!-- product hierarchy ends -->
                            <div class="row">
                                <div class="col-lg-12">
                                <h2 style="text-align:center">Product Details

                                </h2>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">


                                    

                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="name">Product Name</label>
                                        </div>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Product Name" value=""/>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="price">Product Price</label>
                                        </div>
                                        <input type="text" name="price" id="price" class="form-control"
                                            placeholder="Product Price" value="" />
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="cost">My Cost</label>
                                        </div>
                                        <input type="text" name="cost" id="cost" class="form-control" placeholder="My Cost"
                                            value=""  />
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="quantity">Quantity</label>
                                        </div>
                                        <input type="text" name="quantity" id="quantity" class="form-control"
                                            placeholder="Quantity" value=""  />
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="weight">Weight</label>
                                        </div>
                                        <input type="text" name="weight" id="weight" class="form-control"
                                            placeholder="Weight" value=""  />
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="sku">SKU</label>
                                        </div>
                                        <input type="text" name="sku" id="sku" class="form-control" placeholder="Enter SKU"
                                            value=""  />
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="description">Description </label>
                                        </div>
                                        <textarea type="text" name="description" id="description" class="form-control"
                                            placeholder="Product Description" value=""></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="price-before-discount">Product Price Before Discount</label>
                                        </div>
                                        <input type="text" name="price_before_discount" id="price-before-discount"
                                            class="form-control" placeholder="Product Price Before Discount" value=""
                                             />
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="product-availability">Product Availability</label>
                                        </div>
                                        <select id="product-availability" name="product_availability" type="text"
                                            class="form-control" >
                                            <option value="">Please Select Availability</option>
                                            <option value="in stock">In Stock</option>
                                            <option value="out of stock">Out Of Stock</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="shipping-charge">Product Shipping Charge</label>
                                        </div>
                                        <input type="text" name="shipping_charge" id="shipping-charge" class="form-control"
                                            placeholder="Product Shipping Charge" value=""  />
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="image-1">Product Image 1</label>
                                        </div>
                                        <input type="file" name="image1" id="image-1" class="form-control" accept="image/*"
                                            value=""  />
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="image-2">Product Image 2</label>
                                        </div>
                                        <input type="file" name="image2" id="image-2" class="form-control" accept="image/*"
                                            value="" />
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="image-3">Product Image 3</label>
                                        </div>
                                        <input type="file" name="image3" id="image-3" class="form-control" accept="image/*"
                                            value=""  />
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="name">Featured &nbsp; <input type="checkbox" name="feature" value="1"
                                                     /></label>
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="name">Latest &nbsp; <input type="checkbox" name="latest" value="1"
                                                     /></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="contact-section text-center">
                                    <button type="submit"
                                        class="btn btn-info float-right font-size-h5 lh-19 mt-2">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title-wrap bar-warning">
                                    <h2 class="card-title">
                                        Product Detail
                                    </h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-block table-responsive">
                                    <table class="table table-striped table-bordered file-export table-hover "
                                        id="brands-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                
                                                <th>Product Name</th>
                                                <th>Main Menu</th>
                                                <th>Brand</th>
                                                <th>Sub-Brand</th>
                                                <th>Model</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if (isset($hierarchies))
                                                @foreach ($hierarchies as $hierarchy)
                                                    <tr>
                                                        <td>{{ $loop->iteration}}</td>
                                                        <td>{{ $hierarchy->prod->name }}</td>
                                                        <td>
                                                            @if(!isset($hierarchy->parnt->category_id))
                                                            {{$hierarchy->parnt->name}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if(isset($hierarchy->parnt->parnt->parnt->is_brand))
                                                                {{$hierarchy->parnt->parnt->parnt->name}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if(isset($hierarchy->parnt->parnt->is_subbrand))
                                                                {{$hierarchy->parnt->parnt->name}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($hierarchy->parnt->is_model)
                                                                {{$hierarchy->parnt->name}}
                                                            @endif
                                                        </td>

                                                        <td>
                                                        {{$hierarchy->prod->quantity}}
                                                        </td>
                                                       
                                                       


                                                        <td>

                                                            @if (isset($product))
                                                                <form
                                                                    action="{{ route('products.destroy', $product->id) }}"
                                                                    method="POST" style="display: inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" title="Delete"
                                                                        class="btn btn-danger btn-sm"> <span
                                                                            class="fa fa-trash"></span> </button>
                                                                </form>
                                                            @else
                                                                <button
                                                                    onClick="alert('You are not able to delete this menu. Please delete all associated brands thats belongs this menu!')"
                                                                    type="button"
                                                                    title="Please delete all assiated brands from this menu."
                                                                    class="btn btn-danger btn-sm"> <span
                                                                        class="fa fa-trash"></span> </button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


{{-- js portion is started --}}
@section('js')

    <script>
        var arr = ['0', '1', '2'];
        console.log(arr.length);
        $(document).ready(function() {
            $('.main-menuClass').on('change', function() {

                var main = $(this).val();
                var cloneId = $(this).attr('clone-id');
                if (main) {

                    $.ajax({
                        url: '{{ url('/get_brand') }}' + '/' + main,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            console.log(data.length);
                            $('#brand' + cloneId).empty();
                            $('#brand' + cloneId).append(
                                '<option selected disabled value="">Choose Brand</option>');
                            $.each(data, function(name, id) {
                                $('#brand' + cloneId).append(
                                    '<option value="' + id.id + '">' + id.name +
                                    '</option>');
                            });
                        }

                    });
                }
            });
        });
        $(document).ready(function() {
            $('.brandClass').on('change', function() {

                var brandname = $(this).val();
                var cloneId = $(this).attr('clone-id');
                if (brandname) {

                    $.ajax({
                        url: '{{ url('/get_sub_brand') }}' + '/' + brandname,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {

                            $('#brand_model_id' + cloneId).empty();
                            $('#brand_model_id' + cloneId).append(
                                '<option selected disabled value="">Choose Subbrand</option>'
                            );
                            if (data.length > 0) {
                                $.each(data, function(name, id) {
                                    $('#brand_model_id' + cloneId).append(
                                        '<option value="' + id.id + '">' + id.name +
                                        '</option>');
                                });
                            } else {
                                $.ajax({
                                    url: '{{ url('/get_model_from_brand') }}' + '/' +
                                        brandname,
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(data) {

                                        $('#model' + cloneId).empty();
                                        $.each(data, function(name, id) {
                                            $('#model' + cloneId)
                                                .append(
                                                    '<option value="' + id
                                                    .id + '">' + id.name +
                                                    '</option>');
                                        });

                                    }

                                });

                            }


                        }

                    });
                }
            });



        });
        $(document).ready(function() {
            $('.brand-modelClass').on('change', function() {

                var sub_brand = $(this).val();
                var cloneId = $(this).attr('clone-id');


                $.ajax({
                    url: '{{ url('/get_model') }}' + '/' + sub_brand,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {

                        $('#model' + cloneId).empty();
                        $('#model' + cloneId).append(
                            '<option selected disabled value="">Choose Subbrand</option>'
                        );
                        $.each(data, function(name, id) {
                            $('#model' + cloneId).append(
                                '<option value="' + id.id + '">' + id.name +
                                '</option>');
                        });

                    }

                });

            });



        });
        

        $('#add-more-product-clone').click(function() {
            // var clone=$("#hierarchy_section>.row:first>.col-lg-6").clone();
            var clone=$("#hierarchy_section>.row:first>.col-lg-6>.shouldBeCloned").clone();
            alert(JSON.stringify(clone));
            var temp='<div class="row" id="tempRow"><div class="col-lg-6 mainMenuCls"></div><div class="col-lg-6 brandsCls"></div><div class="col-lg-6 subBrandsCls"></div><div class="modelsCls col-lg-6"></div></div>';
            $("#hierarchy_section").append(temp);
            $("#tempRow>.mainMenuCls").html(clone);
            $("#tempRow").removeAttr('id');
        });
        $("#hierarchy_section").on('change','.mainMenuVal',function(){
            var id=$(this).val();
            $(this).removeAttr('name');
            var elemnt=$(this);
            $.ajax({
                type:'get',
                url:"{{route('get_sub')}}",
                data:{'id':id},
                success:function(data){
                    if(data=='no'){
                        elemnt.attr('name','category_id[]');
                    }else{
                        var allOptions='';
                        $.each(data,function(index,item){
                            allOptions += '<option value="'+item.id+'">'+item.name+'</option>';
                        });
                        var output='<div class="form-group mb-4"><div class="mb-2 d-flex align-items-center lh-15"><label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" for="name">BRANDS</label></div><select type="text" class="form-control brandsVal"><option>Select Brand</option>'+allOptions+'</select></div>';
                        elemnt.closest('.row').find('.brandsCls').html(output);
                    }
                }
            });
        });
        $("#hierarchy_section").on('change','.brandsVal',function(){
            var id=$(this).val();
            $(this).removeAttr('name');
            var elemnt=$(this);
            $.ajax({
                type:'get',
                url:"{{route('get_sub')}}",
                data:{'id':id},
                success:function(data){
                    if(data=='no'){
                        elemnt.attr('name','category_id[]');
                    }else{
                        var allOptions='';
                        $.each(data,function(index,item){
                            allOptions += '<option value="'+item.id+'">'+item.name+'</option>';
                        });
                        var output='<div class="form-group mb-4"><div class="mb-2 d-flex align-items-center lh-15"><label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" for="name">Sub Brands</label></div><select type="text" class="form-control subBrandsVal"><option>Select Brand</option>'+allOptions+'</select></div>';
                        elemnt.closest('.row').find('.subBrandsCls').html(output);
                    }
                }
            });
        });

        $("#hierarchy_section").on('change','.subBrandsVal',function(){
            var id=$(this).val();
            $(this).removeAttr('name');
            var elemnt=$(this);
            $.ajax({
                type:'get',
                url:"{{route('get_sub')}}",
                data:{'id':id},
                success:function(data){
                    if(data=='no'){
                        elemnt.attr('name','category_id[]');
                    }else{
                        var allOptions='';
                        $.each(data,function(index,item){
                            allOptions += '<option value="'+item.id+'">'+item.name+'</option>';
                        });
                        var output='<div class="form-group mb-4"><div class="mb-2 d-flex align-items-center lh-15"><label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" for="name">Model</label></div><select type="text" class="form-control modelsVal"><option>Select Brand</option>'+allOptions+'</select></div>';
                        elemnt.closest('.row').find('.modelsCls').html(output);
                    }
                }
            });
        });

        $("#hierarchy_section").on('change','.modelsVal',function(){
            
            $(this).attr('name','category_id[]');
        });

        function reNewHierarchy(element){
            element.closest('.row').find('.subBrandsCls').html('');
            element.closest('.row').find('.brandsCls').html('');
            element.closest('.row').find('.modelsCls').html('');
        }
      

        $(document).delegate('.removeBtnBusiness', 'click', function() {
            var currentRemove = $(this).attr('clone-id');
            $('#add-multiple-product' + currentRemove).remove();
            $(this).remove();
        });

    </script>


@endsection
