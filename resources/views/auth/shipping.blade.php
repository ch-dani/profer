<Strong style="display:none" class="text-info shiiping-text">Shipping Address</Strong>
   
    <!-- <div style="display:none" class="row add-more-address">
        <div class="col-md-12">
            <button type="button" class="btn btn-info btn-sm  float-right add-more-address-clone "
                id="add-more-address-clone"><i class="fa fa-plus"></i> Add Multiple Locations</button>
        </div>
    </div> -->
    <div style="display:none" id="add-multiple-address" class="row mt-2 newArrive" clone-id="0">
        <div class="col-lg-12" style="display:none" id="contentArea">
                <section>
                <div class="container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>street Adress 1</th>
                                <th>street Adress 2</th>
                                <th>country</th>
                                <th>state</th>
                                <th>city</th>
                                <th>zip</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="showLocationsHere">
                           
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-4">
                <div class="mb-2 d-flex align-items-center lh-15">
                    <label for="street_address1"
                        class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Street
                        Address 1</label>
                </div>
                <input id="streedAddress1Val" clone-id="0"
                    placeholder="Street Address 1" type="text" class="form-control street_address1Class"
                    value="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-4">
                <div class="mb-2 d-flex align-items-center lh-15">
                    <label for="street_address2"
                        class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Street Address
                        2</label>
                </div>
                <input name="" id="streedAddress2Val" clone-id="0"
                    placeholder="Street Address 2" type="text" class="form-control street_address2Class"
                    value="">
            </div>
        </div>
        <div class="col-md-6 Business_phone_div_hide">
            <div class="form-group mb-4">
                <div class="mb-2 d-flex align-items-center lh-15">
                    <label for="Address_phone"
                        class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Location Phone
                        Number</label>
                </div>
                <input name="" id="Address_phone0" clone-id="0"
                    placeholder="Location Phone Number" type="text"
                    class="form-control Address_phoneClass" value="">
            </div>
        </div>
        <!-- data with api -->
        <div class="col-md-6">
            <div class="form-group mb-4">
                <div class="mb-2 d-flex align-items-center lh-15">
                    <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                        for="billing_country">Country</label>
                </div>
                <select class=" countryCls countries form-control" id="countryId">
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
                <select class="states stateCls form-control stateCls  state_billing_select" id="stateId">
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
                <select class="cities form-control cityCls" id="cityId">
                    <option value="">Select City</option>
                </select>
            </div>
        </div>

        <!-- api data -->
        <div class="col-md-6">
            <div class="form-group mb-4">
                <div class="mb-2 d-flex align-items-center lh-15">
                    <label for="zip_code"
                        class="mb-0 text-dark font-weight-semibold font-size-md lh-15">Zip
                        Code / Postal Code</label>
                </div>
                <input id="zipVal" placeholder="Zip / Postal Code" type="text"
                    class="form-control zipcode" name="zip_code[]" value="">
            </div>
        </div>


        <div class="row p-5">
            <div class="col-md-12">
                <button type="button" class="btn btn-info btn-sm  float-right"
                    id="addLbtn"><i class="fa fa-plus"></i> Add Locations</button>
            </div>
        </div>
    </div>

   


    <script>
        $("document").ready(function(){
           
        

            $("#addLbtn").on('click',function(){
                $("#contentArea").show();
                var streedAddress1Val=$("#streedAddress1Val").val();
                var streedAddress2Val=$("#streedAddress2Val").val();
                var countryVal=$("#countryId").val();
                var stateVal=$("#stateId").val();
                var cityVal=$("#cityId").val();
                var zipVal=$("#zipVal").val();
                var output='<tr><td><input readonly name="street_address1[]" value="'+streedAddress1Val+'"></td><td><input readonly name="street_address2" value="'+streedAddress2Val+'"></td><td><input readonly name="country[]" value="'+countryVal+'"></td><td><input readonly name="state[]" value="'+stateVal+'"></td><td><input readonly name="city[]" value="'+cityVal+'"></td><td><input readonly name="zips[]" value="'+zipVal+'"></td><td><span class="fa fa-trash del_item"></span></td></tr>';
                $("#showLocationsHere").append(output);

                
            });

            $("#showLocationsHere").on('click','.del_item',function(){
                $(this).closest('tr').remove();
                if($("#showLocationsHere>tr").length==0){
                    $("#contentArea").hide();
                }
                
            })
            
        })
    </script>

    <style>
     #showLocationsHere  input{
            width:100% !important;
            background:none !important;
            border:none !important;
            outline:none !important;

        }
    </style>