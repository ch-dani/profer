@extends('frontend.layouts.master')
@section('title','cart')

@section('css')

@endsection

@section('content')
 
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody id="showCartItemsHere">
                

                 
                
            </tbody>
            <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>Total $ <span class="showGrandTotal"></span></strong></td>
                </tr>
                <tr>
                    <td><a href="{{route('landingpage')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total $<span class="showGrandTotal"></span></strong></td>
                    <td><a href="{{route('checkout')}}" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                </tr>
            </tfoot>
        </table>
    </div>
@csrf
   





@endsection

@section('js')

    <script>
        $("document").ready(function(){
            fetch_all_updated_products();
        });
       
        $(document).delegate(".Productquantity", "change", function() {

            var id = this.id;

            var qty = $(this).val();
            if (qty > 0) {
                $.ajax({
                    url: "{{ url('/cart') }}" + '/' + id,
                    method: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('[name="_token"]').val()
                    },
                    data: {
                        id,
                        qty,
                        '_method': 'PUT'
                    },
                    dataType: 'JSON',
                    beforeSend: function() {
                        $(".Cart-" + id).text('Adding...');
                        $('#cart').css('opacity', '0.3');
                        //alert(id);
                    },
                    complete: function(data) {
                        $(".Cart-" + id).text('Add To Cart');
                        $('#cart').css('opacity', '1');
                        toastr.success('Added to cart Successfully.');
                    },
                    success: function(data) {

                        $('#lblCartCount').text(data.count);

                        $("#cart").load(location.href + " #cart");

                        //$('.cartAmount').text(' AED '+data.total.toLocaleString() );
                        //$('.cartsubAmount').text(' AED '+data.subtotal.toLocaleString() );


                    }
                });
            } else {
                $(this).val(1);
            }

        });

      
    </script>

@endsection
