@extends('layouts.form')

@section('title')
    <title>Create Product</title>
@endsection
@section('content')

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--Form-->
                <form action="{{ route("product.create") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    {{-- @error('name') is-invalid @enderror" --}}
                                    @csrf
                                    <div class="form-group">
                                        <label for="InputProductName">Name:</label>
                                        <input type="text" name="name" class="form-control"  id="InputProductName"
                                            placeholder="Enter ProductName" value="{{ old('name') }}" >
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputProductPrice">Price:</label>
                                        <input type="number" name="price" class="form-control " id="InputProductPrice"
                                            placeholder="Enter ProductPrice" value="{{ old('price') }}">
                                        @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputFeatureImage">FeatureImage:</label>
                                        <input type="file" name="feature_image" class="form-control-file" id="InputFeatureImage">
                                        @error('feature_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputImages">ImagesDetail:</label>
                                        <input type="file" name="image_path[]" class="form-control-file" id="InputImages" multiple>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="SelectCategory">CategoryName:</label>
                                        <select class="form-control" id="SelectCategory" name="category_id">
                                            <option value="0">--None--</option>
                                            {!! $htmlOption !!}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="SelectTags">Tags:</label>
                                        <select name="tags[]" id="SelectTags" class="form-control" multiple="multiple">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="InputContent">Content:</label>
                                        <textarea name="content" id="InputContent" class="form-control tiny-mce5"
                                            rows="15" >{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group attribute-species">
                                            <label >Thu???c t??nh s???n ph???m</label>
                                            <select class="js-example-basic-single js-attribute-select form-control" >
                                                <option value="0">T??y ch???nh thu???c t??nh s???n ph???m</option>
                                                @foreach ($attributes as $attributeItem)
                                                    <option data-url="{{ route("product.opt",['attributeId'=>$attributeItem->id]) }}" value="{{ $attributeItem->id }}">{{ $attributeItem->name }}</option>
                                                @endforeach    
                                        </select>
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
            
                                <!-- /.col-md-6 -->
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                </form>
                <!--End Form-->
            </div>
              
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
@section('js')
<script src="{{ asset("js/main.js") }}"></script>
<script src="https://cdn.tiny.cloud/1/385k8do9vmu752vd9to5jfrpdbjkdapq80uagctc5vva3fmb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $(function(){
    
    $("#SelectTags").select2({
        tags: true,
        tokenSeparators: [',']
    });
    $("#SelectCategory").select2({
        placeholder: "Select a state",
        allowClear: true
    });
    $("#InputRole").select2({
        tags: true,
        tokenSeparators: [',']
    });
});
</script>
<script>
    var editor_config = {
      path_absolute : "/",
      selector: 'textarea.tiny-mce5',
      relative_urls: false,
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table directionality",
        "emoticons template paste textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      file_picker_callback : function(callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
  
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }
  
        tinyMCE.activeEditor.windowManager.openUrl({
          url : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no",
          onMessage: (api, message) => {
            callback(message.content);
          }
        });
      }
    };
  
    tinymce.init(editor_config);
  </script>
@endsection