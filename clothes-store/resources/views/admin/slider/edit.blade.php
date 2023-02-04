@extends('layouts.form')


@section('title')
<title>Edit Link</title>
@endsection

@section('css')

@endsection

@section('content')
    <!-- Main content -->
    <form action="{{ route('slider.edit',['id'=>$slider->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="InputSlider">Name:</label>
                                <input type="text" name="name" class="form-control" id="InputSlider"
                                    placeholder="Enter Slider" value="{{ $slider->name }}">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="InputDescription">Description:</label>
                                    <textarea name="description" id="InputDescription" class="form-control"
                                        rows="15">{{ $slider->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputImage">Image:</label>
                                <input type="file" name="image_name" class="form-control-file " id="InputImage">
                                <div class="col-md-4 container_image">
                                    <div class="row">
                                      <img class="image_name" src="{{ $slider->image_path }}" alt="">
                                    </div>
                                </div>
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
@endsection