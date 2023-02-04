@extends('layouts.home')

@section('title')
<title>Attribute</title>
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
      <a class="btn btn-primary" href="{{ route("attribute.create") }}">Create New Attribute</a>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Attribute ID</th>
          <th>Name</th>
          <th>Taxonomy Attributes</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($attributes as $item)
            <tr>
              <td>#{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                  <div>
                    @if (count($item->listTaxonomyAttributes) > 0)
                  @foreach($item->listTaxonomyAttributes as $itemTaxonomy)
                    @if ($loop->last)
                      <span>{{ $itemTaxonomy->name }}</span>
                    @else
                      <span>{{ $itemTaxonomy->name }},</span>
                    @endif
                  @endforeach
                  @endif
                  </div>
                  <a href="{{ route("taxonomyattribute.index",['attributeId'=>$item->id]) }}">
                    Cấu hình chủng loại của thuộc tính sản phẩm
                  </a>
                </td>
                <td class="action-col">
                  <a class="edit" title="Edit"
                      href="{{ route('attribute.edit',['id'=>$item->id]) }}"><i
                          class="fa fa-edit"></i></a>
                  <a class="delete action_delete active"
                      data-url="{{ route('attribute.destroy',['id'=>$item->id]) }}"
                      title="Delete" href=""><i class="far fa-trash-alt"></i></a>
              </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Attribute ID</th>
            <th>Name</th>
            <th>Taxonomy Attributes</th>
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