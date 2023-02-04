@extends('layouts.form')

@section('title')
    <title>Create Tag</title>
@endsection

 
@section('content')

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route("tag.create") }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="Inputtag">Tag Name:</label>
                      <input type="text" name="name" class="form-control" id="Inputtag"  placeholder="Enter tag">
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
