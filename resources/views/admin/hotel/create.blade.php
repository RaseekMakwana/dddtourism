@extends('admin.layouts.master')

@section('title', 'Create | Hotel')

@section('page_link_and_styles')
<style>
    /* HIDE RADIO */
[type=radio] {
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
  border: 2px solid #f00;
}
</style>
@endsection


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hotel Create</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/hotel') }}" type="button" class="btn btn-primary btn-sm">Manage</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <form action="{{ url('admin/hotel/store') }}" method="post" enctype="multipart/form-data" id="actionForm">
                @csrf
                @if (Session::has('error_message'))
                    <div class="alert alert-danger">
                        {{ Session::get('error_message') }}
                    </div>
                @endif
                @if (Session::has('success_message'))
                    <div class="alert alert-success">
                        {{ Session::get('success_message') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Hotel Type</label>
                                            <select class="form-control" name="hotel_type" required>
                                                <option value="">-- Select--</option>
                                                @foreach ($data['hotel_type'] as $item)
                                                    <option value="{{ $item }}"> {{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" name="title" id="title"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" class="form-control" name="description" id="description" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Location Url</label>
                                            <input type="url" class="form-control" name="location_url" id="location" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input type="text" class="form-control" name="contact_number" id="contact_number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" id="address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" id="email" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Image Gallery</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body" style="display: block;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="btn btn-default btn-file">
                                                <i class="fas fa-paperclip"></i> Attachment
                                                <input type="file" name="featured_image[]" id="featured_image" multiple>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" >
                                    <div class="row" id="imagePreview" >
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" type="button" class="btn btn-block btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->
@endsection

@section('page_link_and_javascripts')

    <script type="text/javascript">
        $('form[id="actionForm"]').validate({
            submitHandler: function(form) {
                // if(input.is('[name="your_name"]'))
                if($('input[name="new_images[]"]').length > 0 || $('input[name="new_image_selected"]').length > 0){
                    if($('input[name="new_image_selected"]').length > 0){
                        form.submit();
                    } else {
                        alert('Please select main thumbnail');
                    }
                } else {
                    alert("Please upload image");
                }
            }
        });
    </script>

    <script>
        $('#featured_image').on('change', function(e){
                var files = e.target.files;
                // $('#imagePreview').empty(); // Clear previous images
                for(var i=0; i<files.length; i++){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#imagePreview').append('<div class="col-md-1 image_block" ><img src="' + e.target.result + '" class="img-thumbnail image_class" style="height: 75px; width: 100%" ><input type="hidden" name="new_images[]" class="hidden_input_class" value="' + e.target.result + '"><p><a href="javascript::void(0)" class="image_remove">Remove</a></p></div>');
                    }
                    reader.readAsDataURL(files[i]);
                }
                $('#featured_image').val("");
            });
    </script>

    <script>
        $(document).on('click',".image_remove",function(){
            $(this).closest('.image_block').remove();
        });
    </script>

    <script>
        $(document).on('click',".image_class",function(){
            $('.image_block').find('.image_class').css("border",'1px solid #dee2e6');
            $('.hidden_input_class').attr("name",'new_images[]');
            $(this).closest('.image_block').find('.image_class').css("border",'1px solid red');
            $(this).closest('.image_block').find('.hidden_input_class').attr("name",'new_image_selected')
        });
    </script>

@endsection
