@extends('layouts.form')

@section('title')
    <title>CEdit User</title>
@endsection

 
@section('content')

   <!-- Main content -->
   <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('user.edit',['id'=>$user->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="InputName">Name:</label>
                        <input type="text" name="name" class="form-control" id="InputName"
                            placeholder="Enter Name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Email:</label>
                        <input type="email" name="email" class="form-control" id="InputEmail"
                            placeholder="Enter Email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="InputRole">Choose Roles:</label>
                        <select class="form-control" name="role_id" id="InputRole">
                            @foreach ($roles as $role)
                                <option {{ $role->id==$user->role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
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
