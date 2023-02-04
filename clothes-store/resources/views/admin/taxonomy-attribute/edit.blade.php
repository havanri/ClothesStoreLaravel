@extends('layouts.form')


@section('title')
<title>Edit Taxonomy</title>
@endsection

@section('css')

@endsection

@section('content')
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <form action="{{ route("taxonomyattribute.edit",["id"=>$taxonomyAttribute->id]) }}" method="post" >
        @csrf
        @method('put')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <input type="hidden" name="attribute_id" value="{{ $taxonomyAttribute->attribute->id }}">
                        <input type="hidden" name="id" value="{{ $taxonomyAttribute->id }}">
                        <div class="form-group">
                            <label for="taxonomyAttribute">Taxonomy Name:</label>
                            <input type="text" name="name" class="form-control" id="taxonomyAttribute" value="{{ $taxonomyAttribute->name }}"  placeholder="Enter attribute">
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