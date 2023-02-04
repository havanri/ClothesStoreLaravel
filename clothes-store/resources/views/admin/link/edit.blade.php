@extends('layouts.form')


@section('title')
<title>Edit Link</title>
@endsection

@section('css')

@endsection

@section('content')
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <form action="{{ route("link.edit",["id"=>$link->id]) }}" method="post" >
        @csrf
        @method('put')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="InputConfigKey">Config key:</label>
                            <input type="text" name="config_key" class="form-control" id="InputConfigKey"
                                placeholder="Enter ConfigKey" value="{{ $link->config_key }}">
                        </div>
                        <div class="form-group">
                            <label for="InputConfigValue">Config value:</label>
                            <input type="text" name="config_value" class="form-control" id="InputConfigValue"
                                placeholder="Enter ConfigValue" value="{{ $link->config_value }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </form>
    <!-- /.content -->
@endsection

@section('js')
{{-- <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('admins/select2/select2js.js') }}"></script> --}}
@endsection