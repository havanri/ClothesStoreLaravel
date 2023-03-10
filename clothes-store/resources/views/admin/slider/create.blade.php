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
                <div class="col-md-6">
                    <form action="{{ route('slider.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="InputSlider">Name:</label>
                            <input type="text" name="name" class="form-control" id="InputSlider"
                                placeholder="Enter Slider">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="InputDescription">Description:</label>
                                <textarea name="description" id="InputDescription" class="form-control"
                                    rows="15" ></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputImage">Image:</label>
                            <input type="file" name="image_name" class="form-control-file " id="InputImage">
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
@section('js')

@endsection