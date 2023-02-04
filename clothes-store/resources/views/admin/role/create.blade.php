@extends('layouts.form')

@section('title')
    <title>Create Role</title>
@endsection

 
@section('content')

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <form action="{{ route("role.create") }}" method="post">
            <div class="col-md-6">
                    @csrf
                    <div class="form-group">
                      <label for="Inputrole">Role Name:</label>
                      <input type="text" name="name" class="form-control" id="Inputrole"  placeholder="Enter role name">
                    </div>
                    <div class="form-group">
                        <label for="Inputdisplayname">Display Name:</label>
                        <input type="text" name="display_name" class="form-control" id="Inputdisplayname"  placeholder="Enter display name">
                    </div>
            </div>
            <!-- /.col-md-6 -->
            <div class="col-md-12">
                <div class="row">    
                    <div class="col-md-12">
                        <label for="">
                            <input type="checkbox" class="checkall">Check All
                        </label>
                    </div>
                    @foreach ($permissions as $permission)
                        <div class="card border-primary mb-3 col-md-12">
                        <div class="card-header">
                            <label for="">
                                <input type="checkbox" value="" class="checkbox_wrapper">
                                Module {{ $permission->name }}
                            </label>
                        </div>
                        <div class="row">
                            @foreach ($permission->permissionsChildren as $permissionItem)
                            <div class="card-body text-primary col-md-3">
                                <h5 class="card-title">
                                    <label for="">
                                        <input type="checkbox" name="permission_id[]" value="{{ $permissionItem->id  }}" class="checkbox_children">
                                        {{ $permissionItem->display_name }}
                                    </label>
                                </h5>
                            </div>
                            @endforeach
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
              
          
        </form>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
