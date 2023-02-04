@extends('layouts.form')

@section('title')
    <title>Create User</title>
@endsection

 
@section('content')

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route("user.create") }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="Inputuser">User Name:</label>
                      <input type="text" name="name" class="form-control" id="Inputuser"  placeholder="Enter user">
                    </div>
                    <div class="form-group">
                      <label for="Inputemail">Email:</label>
                      <input type="email" name="email" class="form-control" id="Inputemail"  placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="Inputpassword">Password:</label>
                        <input type="password" name="password" class="form-control" id="Inputpassword"  placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="SelectuserParent">--Select Role--</label>
                        <select class="form-control" id="SelectuserParent" name="role_id">
                            @foreach($roles as $roleItem)
                                <option value="{{ $roleItem->id }}">{{ $roleItem->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
