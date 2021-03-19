@extends('backend.layouts.app')
@section('title','group')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Groups</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Groups</li>
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
                    <form action="{{ route('groups.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-body">
                            <h2 style="text-align:center">Groups</h2>
                            <div class="row">
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
                                <div class="col-md-12">
                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="name">Group Name</label>
                                        </div>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Group Name" value="" required autofocus autocomplete="off" />
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="discount">Discount(%)</label>
                                        </div>
                                        <input type="text" name="discount" id="discount" class="form-control"
                                            placeholder="Discount" value="" required autofocus autocomplete="off" />
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="mb-2 d-flex align-items-center lh-15">
                                            <label class="mb-0 text-dark font-weight-semibold font-size-md lh-15"
                                                for="description">Description </label>
                                        </div>
                                        <textarea type="text" name="description" id="description" class="form-control"
                                            placeholder="Group Description" value=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="contact-section text-center">
                                    <button type="submit" class="btn btn-info btn-block font-size-h5 lh-19 mt-2">Save &
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
                                        Group Detail
                                    </h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-block table-responsive">
                                    <table
                                        class="table table-striped table-bordered file-export table-hover"
                                        id="main_menu-table">
                                        <thead>
                                            <tr>
                                                <th>Group</th>
                                                <th>Discount</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($groups) && count($groups) > 0)
                                                @foreach($groups as $group)
                                                <tr>
                                                    <td>{{ $group->name }}</td>
                                                    <td>{{ $group->discount }}</td>
                                                    <td>{{ $group->description != null ? $group->description : '-' }}</td>
                                                    <td>
                                                        <a title="Edit" href="{" class="btn btn-info btn-sm"> <span class="fa fa-pencil"></span> </a>
                                                        <form action="" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" title="Delete" class="btn btn-danger btn-sm"> <span class="fa fa-trash"></span> </button>
                                                        </form>
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