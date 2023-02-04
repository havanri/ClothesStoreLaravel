@extends('layouts.form')
@section('title')
<title>Create Link</title>
@endsection
@section('css')
@endsection

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('link.create') }}" method="post" style="width: 100%">
                    @csrf
                    <div class="form-group">
                        <label for="InputConfigKey">Config key:</label>
                        <input type="text" name="config_key" class="form-control" id="InputConfigKey"
                            placeholder="Enter ConfigKey">
                    </div>
                    <div class="form-group">
                        <label for="InputConfigValue">Config value:</label>
                        <input type="text" name="config_value" class="form-control" id="InputConfigValue"
                            placeholder="Enter ConfigValue">
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