@extends('layouts.form')


@section('title')
<title>Edit Category</title>
@endsection

@section('css')

@endsection

@section('content')
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <form action="{{ route("category.edit",["id"=>$category->id]) }}" method="post" >
        @csrf
        @method('put')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label for="InputCategory">Category Name:</label>
                            <input type="text" name="name" class="form-control" id="InputCategory" value="{{ $category->name }}"  placeholder="Enter category">
                          </div>
                          <div class="form-group">
                              <label for="SelectCategoryParent">--Select Category Parent--</label>
                              <select class="form-control" id="SelectCategoryParent" name="parent_id">
                                  <option value="0">--None--</option>
                                  {{-- @foreach ($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach --}}
                                  {!! $htmlOption !!}
                              </select>
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