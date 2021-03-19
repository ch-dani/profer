@extends('backend.layouts.app')


{{-- css portion is started --}}
@section('css')

@endsection


{{-- main content portion is started --}}
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">user</li>
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


                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title-wrap bar-warning">
                                    <h2 class="card-title">
                                        User Detail
                                    </h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-block table-responsive">
                                    <table class="table table-striped table-bordered file-export table-hover "
                                        id="brands-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Company/Individual</th>
                                                <th>Phone Number</th>
                                                <th>Group</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if (isset($users) && count($users) > 0)
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->name }}</td>

                                                        <td>{{ $user->user_type }}
                                                        <td>{{ $user->phone_number }}
                                                        <td>{{ isset($user->group->group->name) ? $user->group->group->name : '-' }}
                                                        </td>

                                                        <td>

                                                            <a title="View" href=""
                                                                class="btn btn-info btn-sm"> <span class="fa fa-eye"></span>
                                                            </a>
                                                            <a  data-toggle="modal" data-target="#myModal" href="" class="btn btn-info btn-sm"> <span class="fa fa-pencil"></span> </a>
                                                          
                                                               
                                                          <a href="javascript:void(0)" value="{{$user->id}}" title="Assigned user to Group" class="btn btn-info btn-sm usergroup" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i></a>
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
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <form action="{{route('assignGroupToUser')}}" method="post">
      @csrf
      <div class="modal-body">
       
        <div class="col-sm-12">
            <h5>User</h5>
            <input id="userWho" readonly class="form-control">
            <input name="user" id="userWhom" hidden value="">
           
        </div>
        <div class="col-sm-12">
            <h5>Select Group</h5>
            <select name="group" class="states form-control" id="stateId">
            <option value="">Select group</option>
            @foreach($groups as $group)
                <option value="{{$group->id}}">{{$group->name}}</option>
            @endforeach
            </select>
        </div>
       
       
      </div>

      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Assign">
      </div>
      </form>
    </div>

  </div>
</div>

@endsection


{{-- js portion is started --}}
@section('js')
    <script>
        $("document").ready(function() {
           $(".usergroup").on('click',function(){
               $("#userWho").attr('placeholder',$(this).closest('tr').find('td:first').html());
               $("#userWhom").attr('value',$(this).attr('value'));
           });

        });

    </script>


@endsection
