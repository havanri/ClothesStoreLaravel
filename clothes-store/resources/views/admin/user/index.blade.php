@extends('layouts.home')

@section('title')
<title>USER</title>
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
      <a class="btn btn-primary" href="{{ route("user.create") }}">Create New User</a>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Username</th>
          <th>Email</th>
          <th>Role</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>
                @isset($item->role->name)
                  {{ $item->role->name }}
                @endisset
                </td>
                <td class="action-col">
                  <a class="edit" title="Edit"
                      href="{{ route('user.edit',['id'=>$item->id]) }}"><i
                          class="fa fa-edit"></i></a>
                  <a class="delete action_delete active"
                      data-url="{{ route('user.destroy',['id'=>$item->id]) }}"
                      title="Delete" href=""><i class="far fa-trash-alt"></i></a>
              </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
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