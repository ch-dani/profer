@php
use App\Models\Category;
$categories=Category::whereNull('category_id')->get();

@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PROREFURBLAB')</title>



    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <link
        href="https://cdn.jsdelivr.net/gh/fontenele/bootstrap-navbar-dropdowns@5.0.2/dist/css/bootstrap-navbar-dropdowns.min.css"
        rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style type="text/css">
        #lblCartCount {
            font-size: 12px;
            background: #2db30c;
            color: #fff;
            padding: 0 4px;
            vertical-align: top;
            position: absolute;
            left: 36%;
            top: 30%;
        }


    </style>

    @yield('css')
</head>

<body>

    {{-- Main header --}}

    <div style="background-color:#004953" class="row text-white p-3">
        <div class="col-md-6">
            <div class="shipping-title" id="ground_div">
                <div id="ground_timer_img"> </div>
                <div>
                    <div id="ground_timer"> </div>
                </div>
                <div class="ground-msg" id="timer_message"><span>TIME LEFT FOR FEDEX GROUND CUTOFF. </span></div>
                <!--<div id="timer_message"><span>Free Shipping on orders above <b>$1000</b> </span></div>-->
            </div>
        </div>
        <div class="col-md-3">
            <div class="shipping-title" id="express_div">
                <div id="express_timer_img"> </div>
                <div>
                    <div id="express_timer"> </div>
                </div>
                <div class="express-msg" id="timer_message"><span>TIME LEFT FOR FEDEX EXPRESS CUTOFF. </span></div>
                <!--<div id="timer_message"><span>Free Expess Shipping on orders above <b>$950</b> </span></div>-->
            </div>
        </div>
        <div class="col-md-3">
            <div style="color: #fff;font-family:'Roboto', sans-serif;">
                <i class="fa fa-phone">&nbsp;</i>
                682 707 5225
            </div>

            <div>
                <i class="fa fa-clock-o">&nbsp;</i>
                <a href="#" style="color: #fff;font-family:'Roboto', sans-serif;;">
                    MONDAY - SATURDAY : 12AM - 7PM&nbsp;
                </a>
            </div>
            <div>
                <i class="fa fa-clock-o">&nbsp;</i>
                <a href="#" style="color: #fff;font-family:'Roboto', sans-serif;;">
                    SUNDAY : 12 PM - 6PM&nbsp;
                </a>
            </div>
        </div>
    </div>

    {{-- Main header end --}}

    {{-- 2nd header for logo, sarch bar etc --}}

    <div class="row">
        <div class="col-md-7 ml-2  d-flex justify-content-center justify-content-md-start">
            <img src={{ asset('images/logo/logonew.png') }} alt="logo" />
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="container h-100">
                        <div class="d-flex justify-content-center h-100">
                            <div class="searchbar">
                                <input class="search_input" type="text" name="" placeholder="Search...">
                                <a href="#" class="search_icon "><i class="fas fa-search"></i></a>
                            </div>
                          
                            <a href="{{route('show_cart')}}"><i class="fa fa-shopping-cart mt-4   float-right"
                                    style="font-size:15px;color:#004953"></i>
                                <span id="lblCartCount"
                                    Class="badge badge-warning  ml-4">{{ session()->has('products') && count(Session::get('products')) > 0 ? count(Session::get('products')) : '0' }}
                                </span> </a>
                            <div>
                            </div>
                            <a class="mt-4 text-primary ml-5" href="route('login')">Login/</a>
                            <a class="mt-4 text-primary" href="{{route('register')}}">Register</a>
                            <a href=""
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="" method="POST"
                                style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end 2nd header for logo, sarch bar etc --}}
    {{-- Nav bar --}}
    <div id="menu_area" class="menu-area p-2">
        <div class="container">
            <div class="row">
                <nav class="navbar  navbar-light navbar-expand-lg mainmenu">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto ">
                            @if (isset($menus) && count($menus) > 0)
                                @foreach ($menus as $menu)
                                    <li class="dropdown">
                                        <a class="dropdown" href="#" id="navbarDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">{{ $menu->name }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @if (isset($menu->brands) && count($menu->brands) > 0)
                                                @foreach ($menu->brands as $brand)
                                                    <li class="dropdown">
                                                        <a class="dropdown"
                                                            href="{{ route('brand.show', $brand->id) }}"
                                                            id="navbarDropdown" role="button" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">{{ $brand->name }}
                                                        </a>
                                                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                                            @if ($brand->brandModels->count())
                                                                @foreach ($brand->brandModels as $model)
                                                                    <li class="dropdown">
                                                                        <a class="dropdown" href="#" id="navbarDropdown"
                                                                            role="button" data-toggle="dropdown"
                                                                            aria-haspopup="true"
                                                                            aria-expanded="false">{{ $model->name }}
                                                                        </a>
                                                                        <ul class="dropdown-menu"
                                                                            aria-labelledby="navbarDropdown">
                                                                            @if (isset($model->items) && count($model->items) > 0)
                                                                                @foreach ($model->items as $item)
                                                                                    <li><a
                                                                                            href="{{ route('items.show', $item->id) }}">{{ $item->name }}</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            @endif
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            @else
                                                                @foreach ($brand->items as $item)
                                                                    <li><a
                                                                            href="{{ route('items.show', $item->id) }}">{{ $item->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                @endforeach
                            @endif
                        </ul>



                        <ul class="navbar-nav mr-auto ">
                            @foreach($categories as $category)
                               
                            <li class="dropdown">
                                <a class="dropdown {{count($category->children)?'':'particularHierarchy'}}" href="#" value="{{$category->id}}" role="button"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{$category->name}}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if(count($category->children))
                                        @include('frontend.menus.childmenu',['children'=>$category->children])
                                    @endif
                                  
                                </ul>
                            </li>
                            @endforeach

                           
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    {{-- Nav bar end --}}


    @yield('content')



    {{-- scription portaion is started --}}
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.23/moment-timezone.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.23/moment-timezone-with-data-2012-2022.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.23/moment-timezone-with-data.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script
        src="https://cdn.jsdelivr.net/gh/fontenele/bootstrap-navbar-dropdowns@5.0.2/dist/js/bootstrap-navbar-dropdowns.min.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    <script>
        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');

            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                $('.dropdown-submenu .show').removeClass("show");
            });

            return false;
        });
        $('.addToCart').click(function() {
            var id = this.id;
            id = id.replace("product-", "");
            var qty = 1;
            $.ajax({
                url: "{{ url('/cart') }}",
                method: "post",
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                },
                data: {
                    id,
                    qty
                },
                dataType: 'JSON',
                beforeSend: function() {
                    $(".Cart-" + id).text('Adding...');
                    //alert(id);
                },
                complete: function(data) {
                    $(".Cart-" + id).text('Add To Cart');
                    toastr.success('Added to cart Successfully.');
                },
                success: function(data) {




                    $('#lblCartCount').text(data.count);
                    //$('.cartAmount').text(' AED '+data.total.toLocaleString() );
                    //$('.cartsubAmount').text(' AED '+data.subtotal.toLocaleString() );


                }
            });
        });

    </script>
    <script>
        // 	/*  function getNowEDT() {
        //  var now = new Date();
        //  now.setMinutes(now.getMinutes() + now.getTimezoneOffset() - 4 * 60); // EDT is UTC-4
        //  return now;
        //  } */
        // Set the date we're counting down to
        //for eastern time we are using offset
        var today = new Date();
        // var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

        if (today.getDay() == 6) {
            document.getElementsByClassName("ground-msg")[0].innerHTML = "ANY FURTHER ORDERS WILL GET SHIPPED MONDAY";
            //console.log(today.getDay())
            var express_date = (today.getMonth() + 1) + '/' + (today.getDate()) + '/' + today.getFullYear();
            var time_expres = 14 + ":" + 00 + ":" + 00;
            var dt_expres = express_date + ' ' + time_expres;
            var countDownDate_expres = new Date(dt_expres).getTime();




            // Update the count down every 1 second
            var y = setInterval(function() {

                // Get todays date and time
                var now_expres = new Date().getTime();

                // Find the distance between now and the count down date
                var distance_expres = countDownDate_expres - now_expres;

                // Time calculations for days, hours, minutes and seconds
                var days_expres = Math.floor(distance_expres / (1000 * 60 * 60 * 24));
                var hours_expres = Math.floor((distance_expres % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes_expres = Math.floor((distance_expres % (1000 * 60 * 60)) / (1000 * 60));
                var seconds_expres = Math.floor((distance_expres % (1000 * 60)) / 1000);

                // /*  console.log(days_expres);
                //  console.log(hours_expres);
                //  console.log(minutes_expres);
                //  console.log(seconds_expres); */
                document.getElementById("express_timer").innerHTML = ('0' + hours_expres).slice(-2) +
                    "<sup>hh</sup> &nbsp;&nbsp;" +
                    ('0' + minutes_expres).slice(-2) + "<sup>mm</sup> &nbsp;&nbsp;" + ('0' + seconds_expres)
                    .slice(-2) + "<sup>ss<sup/> ";

                // If the count down is over, write some text
                if (distance_expres < 0) {

                    document.getElementsByClassName("express-msg")[0].innerHTML =
                        "ANY FURTHER ORDERS WILL GET SHIPPED MONDAY";
                    document.getElementById("express_timer").innerHTML = " ";

                }
            }, 1000);
        } else if (today.getDay() == 0) {
            //console.log("Sunday");
            document.getElementsByClassName("ground-msg")[0].innerHTML = "ANY FURTHER ORDERS WILL GET SHIPPED MONDAY";
            document.getElementsByClassName("express-msg")[0].innerHTML = "ANY FURTHER ORDERS WILL GET SHIPPED MONDAY";


        } else {

            //console.log(today.getDay())
            var ground_date = (today.getMonth() + 1) + '/' + (today.getDate() + 1) + '/' + today.getFullYear();
            var express_date = (today.getMonth() + 1) + '/' + (today.getDate() + 1) + '/' + today.getFullYear();
            var time = 17 + ":" + 00 + ":" + 00;
            var time_expres = 18 + ":" + 00 + ":" + 00;

            var dt = ground_date + ' ' + time;
            var dt_expres = express_date + ' ' + time_expres;
            var countDownDate = new Date(dt).getTime();
            // var countDownDate = moment.tz(countDownDate1 , "America/New_York");
            var countDownDate_expres = new Date(dt_expres).getTime();

            // console.log("<?php echo date('y-m-d 03:00:00'); ?>");
            //console.log(today.getDay());
            //console.log(dt);
            //console.log(countDownDate_expres);

            //var countDownDate = new Date("2019-01-22 06:55:00").getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();
                // console.log(now1);
                // var now = moment.tz(now1 , "America/New_York");
                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // console.log(days);
                // console.log(hours);
                // console.log(minutes);
                // console.log(seconds);
                document.getElementById("ground_timer").innerHTML = ('0' + hours).slice(-2) +
                    "<sup>hh</sup> &nbsp;&nbsp;" +
                    ('0' + minutes).slice(-2) + "<sup>mm</sup> &nbsp;&nbsp;" + ('0' + seconds).slice(-2) +
                    "<sup>ss<sup/> ";

                // If the count down is over, write some text
                if (distance < 0) {
                    // clearInterval(x);
                    today = new Date();
                    // date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+(today.getDate()+1);
                    date = today.getMonth() + '/' + (today.getDate() + 1) + '/' + (today.getFullYear() + 1);
                    time = 17 + ":" + 00 + ":" + 00;
                    dt = date + ' ' + time;
                    countDownDate1 = new Date(dt).getTime();
                    countDownDate = moment.tz(countDownDate1, "America/New_York");
                }
            }, 1000);

            // Update the count down every 1 second
            var y = setInterval(function() {

                // Get todays date and time
                var now_expres = new Date().getTime();

                // Find the distance between now and the count down date
                var distance_expres = countDownDate_expres - now_expres;

                // Time calculations for days, hours, minutes and seconds
                var days_expres = Math.floor(distance_expres / (1000 * 60 * 60 * 24));
                var hours_expres = Math.floor((distance_expres % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes_expres = Math.floor((distance_expres % (1000 * 60 * 60)) / (1000 * 60));
                var seconds_expres = Math.floor((distance_expres % (1000 * 60)) / 1000);

                //console.log(days_expres);
                // console.log(hours);
                // console.log(minutes);
                // console.log(seconds);
                document.getElementById("express_timer").innerHTML = ('0' + hours_expres).slice(-2) +
                    "<sup>hh</sup> &nbsp;&nbsp;" +
                    ('0' + minutes_expres).slice(-2) + "<sup>mm</sup> &nbsp;&nbsp;" + ('0' + seconds_expres)
                    .slice(-2) + "<sup>ss<sup/> ";

                // If the count down is over, write some text
                if (distance_expres < 0) {
                    // clearInterval(x);
                    today_expres = new Date();
                    // date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+(today.getDate()+1);
                    date_expres = today_expres.getMonth() + '/' + (today_expres.getDate() + 1) + '/' + (
                        today_expres.getFullYear() + 1);
                    time_expres = 18 + ":" + 00 + ":" + 00;
                    dt_expres = date_expres + ' ' + time_expres;
                    countDownDate_expres = new Date(dt_expres).getTime()
                }
            }, 1000);
        }




        
    $(".particularHierarchy").on('click',function(){
        $(location).attr('href', '{{route("shop")}}'+'/'+$(this).attr('value'));
    });
    $(".addInCart").on('click',function(){
        var proId=$(this).attr('value');
        // alert(proId);
        $.ajax({
            type:'get',
            url:"{{route('addToCart')}}",
            data:{'id':proId},
            success:function(data){
                // alert(data);
                $("#lblCartCount").html(data.length);
            },
            error:function(a,b,c){
                alert(a+b+c);
            }
        });
        
    });

    $("#showCartItemsHere").on('change','.Proquantity',function(){
        var quantity=$(this).val();
        var id=$(this).attr('id');
        $.ajax({
            type:'get',
            url:'{{route("change_quantity")}}',
            data:{'quantity':quantity,'id':id},
            success:function(data){
                fetch_all_updated_products();
            }
        });
    });
    $("#showCartItemsHere").on('click','.delProduct',function(){
        $.ajax({
            url:"{{route('del_cart_item')}}",
            type:"get",
            data:{'id':$(this).attr('id')},
            success:function(data){
                fetch_all_updated_products();
            }
        });
    });
    function fetch_all_updated_products(){
        $.ajax({
            type:'get',
            url:'{{route("get_all_products")}}',
            success:function(data){
                var trow='';
                var prodTotal=0;
                var grandTotal=0;
                $.each(data,function(index,item){
                    prodTotal = item.quantity*item.price;
                    grandTotal += prodTotal;
                    trow += '<tr> <td data-th="Product"><div class="row"><div class="col-sm-2 hidden-xs"><img src="{{asset('')}}uploads/productImages/'+item.image1+'" width="100%" height="100%" alt="..."class="img-responsive" /></div><div class="col-sm-10"><h4 class="nomargin">'+item.name+'</h4><p>'+item.description+'</p></div></div></td> <td data-th="Price">$'+item.price+'</td><td data-th="Quantity"><input type="number" class="form-control text-center Proquantity" id="'+item.id+'" value="'+item.quantity+'"></td><td data-th="Subtotal" class="text-center">'+prodTotal+'</td><td><button class="btn btn-danger btn-sm delProduct" id="'+item.id+'"><i class="fa fa-trash"></i></button></td></tr>';
                });
                $("#showCartItemsHere").html(trow);
                $(".showGrandTotal").html(grandTotal);
                $("#lblCartCount").html(data.length);
                
            }
        });
    }
	

    </script>

        



    @yield('js')
</body>

</html>
