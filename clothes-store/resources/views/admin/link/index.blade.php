@extends('layouts.home')

@section('title')
<title>LINK</title>
@endsection

@section('css')

@endsection

@section('content')
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{-- <a href="/admin/links/create" class="btn btn-success float-right m-2">Add</a> --}}
                <a class="btn btn-app float-right" class="add" title="Add" href="{{ route('link.create') }}"><i
                        class="fas fa-plus-circle"></i>New link Link</a>
            </div>
            <div class="col-12">
                <!-- /.card -->

                <div class="card">
                    {{-- <div class="card-header">
                        <h3 class="card-title">BẢNG SẢN PHẨM</h3>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Config Key</th>
                                    <th>Config Value</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($links as $item) 
                                    <tr>
                                    <td>{{ $item->config_key }}</td>
                                    <td>{{ $item->config_value}}</td>
                                    <td class="action-col">
                                        <a class="edit" title="Edit"
                                            href="{{ route('link.edit',['id'=>$item->id]) }}"><i
                                                class="fa fa-edit"></i></a>
                                        <a class="delete action_delete active"
                                            data-url="{{ route('link.destroy',['id'=>$item->id]) }}"
                                            title="Delete" href=""><i class="far fa-trash-alt"></i></a>
                                    </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Config Key</th>
                                    <th>Config Value</th>
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
@endsection



@section('js')

@endsection