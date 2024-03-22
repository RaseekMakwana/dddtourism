@extends('admin.layouts.master')

@section('title', 'Edit | Photo Gallery')

@section('page_link_and_styles')
@endsection

@php
    $edit = $data['edit_record'];
@endphp

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Photo Gallery</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/photo-gallery') }}" type="button" class="btn btn-primary btn-sm">Manage</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <form action="{{ url('admin/photo-gallery/update') }}" method="post" enctype="multipart/form-data" id="actionForm">
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
                    <input type="hidden" id="hidden_record_id" value="{{ $edit->id }}" name="hidden_record_id">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="english_title">English Title</label>
                                            <input type="text" class="form-control" name="english_title"
                                                id="english_title" value="{{ $edit->english_title }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gujarati_title">Gujarati Title</label>
                                            <input type="text" class="form-control" name="gujarati_title"
                                                id="gujarati_title" value="{{ $edit->gujarati_title }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="hindi_title">Hindi Title</label>
                                            <input type="text" class="form-control" name="hindi_title" id="hindi_title" value="{{ $edit->hindi_title }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="event_date">Event Date</label>
                                            <input type="date" class="form-control" name="event_date"
                                                max="{{ date('Y-m-d') }}" id="event_date" value="{{ $edit->event_date }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Image Gallery</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
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
                                    <div class="col-md-12">
                                        <div class="row" id="imagePreview">
                                            @if (!empty($data['gallery']))
                                                @foreach ($data['gallery'] as $element)
                                                    @if ($element->filename == $edit->featured_image)
                                                        <div class="col-md-1 image_block old_image_data">
                                                            <img src="{{ asset('storage/photo-gallery/' . $element->slug . '/' . $element->filename) }}"
                                                                class="img-thumbnail image_class"
                                                                style="height: 75px; width: 100%;  border: 1px solid red;">
                                                            <input type="hidden" name="new_image_selected"
                                                                class="hidden_input_class"
                                                                value="{{ 'old~' . $element->id . '~' . $element->filename }}">
                                                            <p><a href="javascript::void(0)" class="image_remove">Remove</a>
                                                            </p>
                                                        </div>
                                                    @else
                                                        <div class="col-md-1 image_block old_image_data">
                                                            <img src="{{ asset('storage/photo-gallery/' . $element->slug . '/' . $element->filename) }}"
                                                                class="img-thumbnail image_class"
                                                                style="height: 75px; width: 100%">
                                                            <input type="hidden" name="new_images[]"
                                                                class="hidden_input_class"
                                                                value="{{ 'old~' . $element->id . '~' . $element->filename }}">
                                                            <p><a href="javascript::void(0)" class="image_remove">Remove</a>
                                                            </p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="row" id="removed_images">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" type="button" class="btn btn-primary">Update</button>
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
                if ($('input[name="new_images[]"]').length > 0 || $('input[name="new_image_selected"]')
                    .length > 0) {
                    if ($('input[name="new_image_selected"]').length > 0) {
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
        $('#featured_image').on('change', function(e) {
            var files = e.target.files;
            // $('#imagePreview').empty(); // Clear previous images
            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').append('<div class="col-md-1 image_block"><img src="' + e.target.result +
                        '" class="img-thumbnail image_class" style="height: 75px; width: 100%" ><input type="hidden" name="new_images[]" class="hidden_input_class" value="' +
                        e.target.result +
                        '"><p><a href="javascript::void(0)" class="image_remove">Remove</a></p></div>');
                }
                reader.readAsDataURL(files[i]);
            }
            $('#featured_image').val("");
        });
    </script>

    <script>
        $(document).on('click', ".image_remove", function() {
            // OLD IMAGE REMOVE
            if ($(this).closest('.old_image_data')) {
                var id = $(this).closest('.image_block').find('.hidden_input_class').val();
                $('#removed_images').append('<input type="hidden" name="removed_images[]" value="' + id + '">');
                $(this).closest('.image_block').remove();
                $(this).closest('#imagePreview').find('.image_block').remove();
            }
            // NEW IAMGE
            $(this).closest('.image_block').remove();
        });
    </script>

    <script>
        $(document).on('click', ".image_class", function() {
            $('.image_block').find('.image_class').css("border", '1px solid #dee2e6');
            $('.hidden_input_class').attr("name", 'new_images[]');
            $(this).closest('.image_block').find('.image_class').css("border", '1px solid red');
            $(this).closest('.image_block').find('.hidden_input_class').attr("name", 'new_image_selected')
        });
    </script>

@endsection
