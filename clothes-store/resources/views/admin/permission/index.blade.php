@extends('layouts.home')

@section('title')
<title>Permission</title>
@endsection

@section('css')

@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <a class="btn btn-primary" href="{{ route("permission.create") }}">Create New Permission</a>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>permission Name</th>
          <th>display name</th>
          <th>key code</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($permissions as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->display_name }}</td>
                <td>{{ $item->key_code }}</td>
                <td class="action-col">
                  <a class="edit" title="Edit"
                      href="{{ route('permission.edit',['id'=>$item->id]) }}"><i
                          class="fa fa-edit"></i></a>
                  <a class="delete action_delete active"
                      data-url="{{ route('permission.destroy',['id'=>$item->id]) }}"
                      title="Delete" href=""><i class="far fa-trash-alt"></i></a>
              </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
        <th>permission Name</th>
          <th>display name</th>
          <th>key code</th>
          <th></th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection



@section('js')

@endsection