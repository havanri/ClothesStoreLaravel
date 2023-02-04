@extends('layouts.form')


@section('title')
<title>Edit Tag</title>
@endsection

@section('css')

@endsection

@section('content')
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <form action="{{ route("tag.edit",["id"=>$tag->id]) }}" method="post" >
        @csrf
        @method('put')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label for="Inputtag">tag Name:</label>
                            <input type="text" name="name" class="form-control" id="Inputtag" value="{{ $tag->name }}"  placeholder="Enter tag">
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