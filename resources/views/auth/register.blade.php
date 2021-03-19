@extends('frontend.layouts.master')

@section('css')

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{asset('js/countrystatecity.js')}}"></script>
        <style>
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: #444;
                line-height: 28px;
                /* display: block; */
                width: 100%;
                height: calc(2.25rem + 2px);
                padding: .375rem .75rem;
                font-size: 1rem;
                line-height: 1.5;
                color: #495057;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #ced4da;
                border-radius: .25rem;
                transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            }

            .select2-container--default .select2-selection--single {
                background-color: #fff;
                border: none !important;
                border-radius: 4px;
            }

        </style>

    </head>

@endsection
@section('content')
    <div class="container">
        <div class="row  d-flex justify-content-center">
            <div class="card col-md-12 border-0 mt-5">
                <div style="font-size: 25px;  font-weight:bold;" class="card-header text-center text-info ">
                    {{ __('Registeration') }}</div>
                <div class="card card-body">
                    <form method="POST" action="{{route('save.user')}}" enctype="multipart/form-data">
                        @csrf
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
                        <div class="form-group mb-4">
                            <div class="mb-2 d-flex align-items-center lh-15">
                                <label for="intrest"
                                    class="mb-0 text-dark font-weight-semibold font-size-md lh-15 user-text">User
                                    Type</label>
                            </div>
                            <select class="form-control" id="user_type" name="user_type">
                                <option value="Please Select">Please Select</option>
                                <option value="Company">Company</option>
                                <option value="Individual">Individual</option>
                            </select>
                        </div>
                        <Strong style="display:none" class="text-info company-text">Company Detail</Strong>

                        <div style="display:none" class="row mt-2 company">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="company_name"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Company
                                            Name</label>
                                    </div>
                                    <input id="company_name" placeholder="Company Name" type="text" class="form-control"
                                        name="company_name" value="">
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group mb-4">
                                    <label for="chkPassport">
                                        <input type="checkbox" id="chktax" />
                                        Do you have TAX/VAT?
                                    </label>
                                </div>
                            </div>


                            <div style="display:none" class="col-md-6 tax">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="tax"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Tax/VAT
                                            Number</label>
                                    </div>
                                    <input id="tax" placeholder="Tax / VAT Number" type="text" class="form-control"
                                        name="tax" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="company_website"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Company
                                            Website</label>
                                    </div>
                                    <input id="company_website" placeholder="Company Website" type="text"
                                        class="form-control" name="company_website" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="company_number"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Company
                                            Number</label>
                                    </div>
                                    <input id="company_number" placeholder="Company Number" type="text" class="form-control"
                                        name="company_number" value="">
                                </div>
                            </div>

                        </div>
                        <Strong style="display:none" class="text-info billing-text">Company Billing Address</Strong>
                        <div style="display:none"  class="row mt-2 company_billing">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="company_street_address1"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Street Address
                                            1</label>
                                    </div>
                                    <input id="company_street_address1" placeholder="Street Address 1" type="text"
                                        class="form-control" name="company_street_address1" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="company_street_address1"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Street Address
                                            2</label>
                                    </div>
                                    <input id="company_street_address2" placeholder="Street Address 2" type="text"
                                        class="form-control" name="company_street_address2" value="">
                                </div>
                            </div>

                            <!-- data with api -->
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                            for="billing_country">Country</label>
                                    </div>
                                    <select name="country" class=" countryCls countries form-control"       id="">
                                    <option value="">Select Country</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                            for="state">State/Province</label>
                                    </div>
                                    <select class="states stateCls form-control stateCls  state_billing_select" name="billing_state" id="">
                                        <option value=""> Select State</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                            for="city">City</label>
                                    </div>
                                    <select class="cities cityCls form-control city_select" name="billing_city" id="">
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                            </div>

                            <!-- api data -->
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="company_number"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Zip Code</label>
                                    </div>
                                    <input id="billing_zip_code" placeholder="Zip Code" type="text"
                                        class="form-control" name="billing_zip_code" value="">
                                </div>
                            </div>
                        </div>
                        <Strong style="display:none" class="text-info contact-text">Contact Detail</Strong>
                        <div style="display:none" class="row mt-2 contact">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="First_Name"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">First
                                            Name</label>
                                    </div>
                                    <input id="name" placeholder="First Name" type="text" class="form-control" name="name"
                                        value="" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="name"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Last
                                            Name</label>
                                    </div>
                                    <input id="last_name" placeholder="Last Name" type="text" class="form-control"
                                        name="last_name" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="email"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Email</label>
                                    </div>
                                    <input id="email" placeholder="Email" type="text" class="form-control" name="email"
                                        value="">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="Phone_Number"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Phone
                                            Number

                                        </label>
                                    </div>
                                    <input id="name" placeholder="PhoneNumber" type="text" class="form-control"
                                        name="phone_number" value="" >
                                </div>
                            </div>
                            <div  class="col-md-6 position">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="position"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Position

                                        </label>
                                    </div>
                                    <input id="position" placeholder="e.g Owner, Shipping Manager" type="text" class="form-control"
                                        name="position" value="" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="password"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">PASSWORD</label>
                                    </div>
                                    <input id="password" placeholder="Password" type="password" class="form-control"
                                        name="password" value="">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="name"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Confirm
                                            PASSWORD</label>
                                    </div>
                                    <input id="password-confirm" type="password" placeholder="Confirm Password"
                                        class="form-control" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <!-- add here shipping account -->
                        @include('auth.shipping')
                        <!--  ends add here shipping address -->
                        <Strong style="display:none" class="text-info other-info">Additional Detail</Strong>
                        <div style="display:none" class="row mt-2 other">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="how_did_you_know"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">How Did You Here
                                            about this?</label>
                                    </div>
                                    <select class="form-control" id="how_did_you_know" name="how_did_you_know">
                                        <option value="">Please Select</option>
                                        <option value="Facebook Feed/Ads">Facebook Feed/Ads</option>
                                        <option value="Facebook Group">Facebook Group</option>
                                        <option value="Twitter">Twitter</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="Linkedin">Linkedin</option>
                                        <option value="Word of Mouth">Word of Mouth</option>
                                        <option value="Convention/Congress">Convention/Congress</option>
                                        <option value="Google Search">Google Search</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <div class="mb-2 d-flex align-items-center lh-15">
                                        <label for="intrest"
                                            class="mb-0 text-dark font-weight-semibold font-size-md lh-15">What best
                                            describes your business?</label>
                                    </div>
                                    <select class="form-control" id="intrest" name="intrest">
                                        <option value="">Please Select</option>
                                        <option value="Carrier Rtail Store">Carrier Rtail Store</option>
                                        <option value="Franchise Repair Store">Franchise Repair Store</option>
                                        <option value="Government / School District">Government / School District</option>
                                        <option value="Independent Repair Store">Independent Repair Store</option>
                                        <option value="Insurance">Insurance</option>
                                        <option value="Refurbishing Depot">Refurbishing Depot</option>
                                        <option value="Repair Depot">Repair Depot</option>
                                        <option value="Reseller">Reseller</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-4">
                                    <button type="submit" class="btn btn-info float-right">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


    <script>

////////////////////////////////////////

$(document).ready(function() {
            $('.country_billing_select').on('change', function() {

                var country = $(this).val();

                if (country) {

                    $.ajax({
                        url: '{{ url('/get_state') }}' + '/' + country,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            console.log(data.length);
                            $('#state_id').empty();
                            $('#state_id').append(
                                '<option selected disabled value="">Select State</option>');
                            $.each(data, function(name, id) {
                                $('#state_id').append(
                                    '<option value="' + id.id + '">' + id.name +
                                    '</option>');
                            });
                        }

                    });
                }
            });
        });
        $(document).ready(function() {
            $('.state_billing_select').on('change', function() {

                var state = $(this).val();

                if (state) {

                    $.ajax({
                        url: '{{ url('/get_city') }}' + '/' + state,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            console.log(data.length);
                            $('#city_id').empty();
                            $('#city_id').append(
                                '<option selected disabled value="">Select city</option>');
                            $.each(data, function(name, id) {
                                $('#city_id').append(
                                    '<option value="' + id.id + '">' + id.name +
                                    '</option>');
                            });
                        }
                    });
                }
            });
        });








////////////////////////////////////

        $(document).ready(function() {
            $('.country_select').on('change', function() {

                var country = $(this).val();
                var cloneId = $(this).attr('clone-id');
                if (country) {

                    $.ajax({
                        url: '{{ url('/get_state') }}' + '/' + country,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            console.log(data.length);
                            $('#state_id' + cloneId).empty();
                            $('#state_id' + cloneId).append(
                                '<option selected disabled value="">Select State</option>');
                            $.each(data, function(name, id) {
                                $('#state_id' + cloneId).append(
                                    '<option value="' + id.id + '">' + id.name +
                                    '</option>');
                            });
                        }

                    });
                }
            });
        });
        $(document).ready(function() {
            $('.state_select').on('change', function() {

                var state = $(this).val();
                var cloneId = $(this).attr('clone-id');
                if (state) {

                    $.ajax({
                        url: '{{ url('/get_city') }}' + '/' + state,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            console.log(data.length);
                            $('#city_id' + cloneId).empty();
                            $('#city_id' + cloneId).append(
                                '<option selected disabled value="">Select city</option>');
                            $.each(data, function(name, id) {
                                $('#city_id' + cloneId).append(
                                    '<option value="' + id.id + '">' + id.name +
                                    '</option>');
                            });
                        }
                    });
                }
            });
        });

        // $(document).ready(function() {
        //     $('.city').select2();
        //     $('.country').select2();
        //     $('.state').select2();

        // });

        var incrementIdBusiness = 1;

        $('#add-more-address-clone').click(function() {

            var newElment = $('#add-multiple-address').clone(true);
            newElment.find('.street_address1Class').attr('id', 'street_address1' + incrementIdBusiness);
            newElment.find('.street_address1Class').attr('clone-id', incrementIdBusiness);
            newElment.find('.street_address2Class').attr('id', 'street_address2' + incrementIdBusiness);
            newElment.find('.street_address2Class').attr('clone-id', incrementIdBusiness);
            newElment.find('.Address_phoneClass').attr('id', 'Address_phone' + incrementIdBusiness);
            newElment.find('.Address_phoneClass').attr('clone-id', incrementIdBusiness);
            newElment.find('.country').attr('id', 'country_id' + incrementIdBusiness);
            newElment.find('.country').attr('clone-id', incrementIdBusiness);
            newElment.find('.state').attr('id', 'state_id' + incrementIdBusiness);
            newElment.find('.state').attr('clone-id', incrementIdBusiness);
            newElment.find('.city').attr('id', 'city_id' + incrementIdBusiness);
            newElment.find('.city').attr('clone-id', incrementIdBusiness);
            newElment.find('.zipcode').attr('id', 'zip_code' + incrementIdBusiness);
            newElment.find('.zipcode').attr('clone-id', incrementIdBusiness);
            newElment.attr('id', 'add-multiple-address' + incrementIdBusiness);
            newElment.attr('clone-id', incrementIdBusiness);
            newElment.insertAfter('#add-multiple-address').before(
                "<div class='col-md-7 offset-5'><button class='btn btn-danger btn-sm float-right removeBtnBusiness' clone-id='" +
                incrementIdBusiness + "'> <i class='fa fa-minus'></i> </button>");;
            incrementIdBusiness++;


        });


        $(document).delegate('.removeBtnBusiness', 'click', function() {
            var currentRemove = $(this).attr('clone-id');
            $('#add-multiple-address' + currentRemove).remove();
            $(this).remove();
        });
        $("#user_type").change(function() {

            if ($(this).val() == "Individual") {

                $('.contact-text').show();
                $('.contact').show();
                $('.shiiping-text').show();
                $('.newArrival').show();
                $('.other').show();
                $(".add-more-address").show();
                $('.newArrive').show();
                $('.other-info').show();
                $("#user_type").hide();
                $(".position").hide();
                $('.Business_phone_div_hide').hide();
                $('.user-text').hide();

            } else {
                $('.company').show();
                $('.company-text').show();
                $('.Business_phone_div_hide').show();
                $('.add-more-address-clone').show();
                $('.billing-text').show();
                $('.company_billing').show();
                $('.contact-text').show();
                $('.contact').show();
                $('.shiiping-text').show();
                $('.newArrival').show();
                $('.other').show();
                $(".add-more-address").show();
                $('.newArrive').show();
                $('.other-info').show();
                $("#user_type").hide();
                $('.user-text').hide();


            }
        });

        $("#chktax").click(function() {
            if ($(this).is(":checked")) {
                $('.tax').show();
            } else {
                $('.tax').hide();
            }
        });


        // var loc = new locationInfo();
        // console.log(loc);
        // alert(JSON.stringify(loc));

    </script>

@endsection
