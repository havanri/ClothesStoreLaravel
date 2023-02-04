@extends('layouts.form')



@section('title')
<title>Create Permission</title>
@endsection
@section('css')
@endsection

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('permission.create') }}" method="post" style="width: 100%">
                    @csrf
                    <div class="form-group">
                        <label for="SelectPermissionParent">Select Parent Permission:</label>
                        <select class="form-control" id="SelectPermissionParent" name="module_parent">
                            <option value="">--Module Name--</option>
                            @foreach (config('permissions.table_module') as $moduleItem)
                                <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            @foreach (config('permissions.module_children') as $moduleChildrenItem)
                            <div class="col-md-3">
                                <label for="">
                                    <input type="checkbox" name="module_child[]" id="" value="{{ $moduleChildrenItem }}">
                                    {{ $moduleChildrenItem }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
@section('js')

@endsection