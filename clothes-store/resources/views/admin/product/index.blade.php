@extends('layouts.home')

@section('title')
<title>PRODUCT</title>
@endsection

@section('css')

@endsection

@section('content')
<div class="card">
    {{-- <div class="card-header">
        <h3 class="card-title">BẢNG SẢN PHẨM</h3>
    </div> --}}
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category Name</th>
                    <th>Tags</th>
                    <th>Created</th>
                    <th></th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($products as $item)
                <th scope="row">{{ $item->id}}</th>
                <td><img class="product_image_150_100"
                    src="{{ $item->feature_image_path}}" alt=""></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ number_format($item->price) }}</td>
                    <td>{{ optional($item->category)->name }}</td>
                    <td>
                        @foreach($item->tags as $itemTag)
                            @if ($loop->last)
                            <span>{{ $itemTag->name }}</span>
                            @else
                            <span>{{ $itemTag->name }},</span>
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td class="action-col">
                        <a class="edit" title="Edit"
                            href="{{ route('product.edit',['id'=>$item->id]) }}"><i
                                class="fa fa-edit"></i></a>
                        <a class="delete action_delete active"
                            data-url="{{ route('product.destroy',['id'=>$item->id]) }}"
                            title="Delete" href=""><i class="far fa-trash-alt"></i></a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Product ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category Name</th>
                    <th>Tags</th>
                    <th>Created</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection



@section('js')

@endsection