@extends('layouts.home')

@section('title')
<title>Slider</title>
@endsection

@section('css')

@endsection

@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{-- <a href="/admin/products/create" class="btn btn-success float-right m-2">Add</a> --}}
                <a class="btn btn-app float-right" class="add" title="Add" href="{{ route('slider.create') }}"><i
                        class="fas fa-plus-circle"></i>New Slider</a>
            </div>
            <div class="col-12">
                <!-- /.card -->

                <div class="card">
                    {{-- <div class="card-header">
                        <h3 class="card-title">BẢNG Slider</h3>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th >Name</th>
                                    <th >Image</th>
                                    <th >Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $item) <tr>
                                    <td>{{ $item->name }}</td>
                                    <td><img class="product_image_150_100" src="{{ $item->image_path}}" alt=""></td>
                                    <td>{{ $item->description }}</td>
                                    <td class="action-col">
                                        <a class="edit" title="Edit"
                                            href="{{ route('slider.edit',['id'=>$item->id]) }}"><i
                                                class="fa fa-edit"></i></a>
                                        <a class="delete action_delete active"
                                            data-url="{{ route('slider.destroy',['id'=>$item->id]) }}"
                                            title="Delete" href=""><i class="far fa-trash-alt"></i></a>
                                    </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th >Name</th>
                                    <th >Image</th>
                                    <th >Description</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection



@section('js')

@endsection