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
                    <form action="{{route('save.brand')}}" method="POST" enctype="multipart/form-data">
                    	@csrf
                        <div class="card card-body">
                            <h2 style="text-align:center">Main Menu</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" for="name">Menu Name</label>
                                        </div>
                                        <select class="form-control" name="category_id">
                                                <option>Select  Menu</option>
                                            @foreach($menus as $menu)
                                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15" >Brand Name</label>
                                        </div>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Brand Name" value="">
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
                                                <th>Description</th>
                                                <th>Action</th>
											</tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($brands as $brand)
                                        		<tr>
                                                    <td>{{$brand->parnt->name}}</td>
                                        			<td>{{$brand->name}}</td>
                                        			<td>{{$brand->description}}</td>
                                        			<td>
                                                <a title="Edit" href="http://127.0.0.1:8000/main-menu/22/edit" class="btn btn-info btn-sm"> <span class="fa fa-pencil"></span> </a>
                                                <button onclick="alert('You are not able to delete this menu. Please delete all assiated brands thats belongs this menu!')" type="button" title="Please delete all assiated brands from this menu." class="btn btn-danger btn-sm"> <span class="fa fa-trash"></span> </button>
                                                </td>
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
@endsection
