@extends('backend.layouts.app')
@section('title','brands')
@section('content')
	<div class="container-fluid">
		@if(session()->has('success'))
		    <div class="alert alert-success">
		        {{session()->get('success')}}
		    </div>
		@endif
	</div>
	<section class="content">
        <div id="wrapper-content" class="wrapper-content pb-13 pt-8">
            <div class="container">
				<div id="submit-listing" class="section-submit-listing pb-2">
                    <form action="{{route('save.model')}}" method="POST" enctype="multipart/form-data">
                    	@csrf
                        <div class="card card-body">
                            <h2 style="text-align:center">Main Menu</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" for="name">Menu Name</label>
                                        </div>
                                        <select class="form-control" id="select_menu">
                                            <option>Select  Menu</option>
                                            @foreach($menus as $menu)
                                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>



                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" for="name">Brand Name</label>
                                        </div>
                                        <select class="form-control" id="show_brand">
                                            <option>Select Brand</option>
                                        </select>

                                    </div>




                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" >Sub-Brand</label>
                                        </div>
                                        <select class="form-control" name="category_id" id="show_sub_brand">
                                            <option>Select Sub Brand</option>
                                        </select>
                                    </div>


                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" >Model Name</label>
                                        </div>
                                        <input class="form-control" name="name">


                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" for="description">Description </label>
                                        </div>
                                        <textarea type="text" name="description" id="description" class="form-control" placeholder="Main-menu Description" value=""></textarea>
                                	</div>
								</div>
							</div>
                            <div class="">
                                <div class="contact-section text-center">
                                    <button type="submit" class="btn btn-info btn-block font-size-h5 lh-19 mt-2">Save &amp;
                                        Preview</button>
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
                                        Main Menu Detail
                                    </h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-block table-responsive">
                                    <table class="table table-striped table-bordered file-export table-hover" id="main_menu-table">
                                        <thead>
                                            <tr>
                                                <th>Main-menu</th>
                                                <th>Brand</th>
                                                <th>Sub-brand</th>
                                                <th>Model</th>
                                                <th>Description</th>
                                                <th>Action</th>
											</tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($models as $model)
                                            <tr>
                                                <td>{{ $model->parnt->parnt->parnt->name }}</td>
                                                <td>{{ $model->parnt->parnt->name }}</td>
                                                <td>{{ $model->parnt->name }}</td>
                                                <td>{{ $model->name }}</td>
                                                <td>{{ $model->description }}</td>
                                                <td><i class="fa fa-edit"></i></td>
                                            </tr>

                                            @endforeach
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $("#select_menu").on('change',function(){
        var id = $(this).val();
        $.ajax({
            type:"get",
            url:"{{ route('allsubs') }}",
            data:{id:id},
            success:function(data){
                var output='<option>Select Brand</option>';
                $.each(data,function(index,item){
                    output += '<option value="'+item.id+'">'+item.name+'</option>';
                });
                $("#show_brand").html(output);
            },
            error:function(a,b,c){
                alert(a+b+c);
            }
        });
    });
    $("#show_brand").on('change',function(){
        var id = $(this).val();
        $.ajax({
            type:"get",
            url:"{{ route('allsubbrands') }}",
            data:{id:id},
            success:function(data){
                var output='<option>Select Brand</option>';
                $.each(data,function(index,item){
                    output += '<option value="'+item.id+'">'+item.name+'</option>';
                });
                $("#show_sub_brand").html(output);
            },
            error:function(a,b,c){
                alert(a+b+c);
            }
        });
    })
</script>
@endsection

