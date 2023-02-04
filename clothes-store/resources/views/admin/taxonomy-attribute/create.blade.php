@extends('layouts.form')

@section('title')
    <title>Create Taxonomy</title>
@endsection

 
@section('content')
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route("taxonomyattribute.store") }}" method="post">
                    @csrf
                    @method("post")
                    <input type="hidden" name="attribute_id" value="{{ $attribute_id }}">
                    <div class="form-group">
                      <label for="Inputtaxonomy">Taxonomy Name:</label>
                      <input type="text" name="name" class="form-control" id="Inputtaxonomy"  placeholder="Enter taxonomy">
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
