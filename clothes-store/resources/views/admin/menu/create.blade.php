@extends('layouts.form')

@section('title')
    <title>Create Menuy</title>
@endsection

 
@section('content')

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route("menu.create") }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="Inputmenu">Menu Name:</label>
                      <input type="text" name="name" class="form-control" id="Inputmenu"  placeholder="Enter menu">
                    </div>
                    <div class="form-group">
                        <label for="SelectmenuParent">--Select menu Parent--</label>
                        <select class="form-control" id="SelectmenuParent" name="parent_id">
                            <option value="0">--None--</option>
                            {!! $htmlOption !!}
                        </select>
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
