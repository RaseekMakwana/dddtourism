@extends('admin.layouts.master')

@section('title', 'Edit | Pages')

@section('page_link_and_styles')
@endsection


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Page</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/place-to-visit') }}" type="button" class="btn btn-primary btn-sm">Manage</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ url('admin/place-to-visit/update') }}" method="post" enctype="multipart/form-data">
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
                    <input type="hidden" id="hidden_record_id" value="{{ $data['edit_record']->id }}" name="hidden_record_id">

                    <div class="col-md-9">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">English Contents</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="english_title">English Title</label>
                                    <input type="text" class="form-control" name="english_title" id="english_title" value="{{ $data['edit_record']->english_title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="english_sort_content">Sort Description</label>
                                    <input type="text" class="form-control" name="english_sort_content" id="english_sort_content" value="{{ $data['edit_record']->english_sort_content }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="100" name="english_content" id="apply-ckeditor1" required>{{ $data['edit_record']->english_content }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Gujarati Contents</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="gujarati_title">Gujarati Title</label>
                                    <input type="text" class="form-control" name="gujarati_title" id="gujarati_title"
                                        value="{{ $data['edit_record']->gujarati_title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="gujarati_sort_content">Sort Description</label>
                                    <input type="text" class="form-control" name="gujarati_sort_content" id="gujarati_sort_content" value="{{ $data['edit_record']->gujarati_sort_content }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="100" name="gujarati_content" id="apply-ckeditor2" required>{{ $data['edit_record']->gujarati_content }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Hindi Contents</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="hindi_title">Hindi Title</label>
                                    <input type="text" class="form-control" name="hindi_title" id="hindi_title"
                                        value="{{ $data['edit_record']->hindi_title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="hindi_sort_content">Sort Description</label>
                                    <input type="text" class="form-control" name="hindi_sort_content" id="hindi_sort_content" value="{{ $data['edit_record']->hindi_sort_content }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="100" name="hindi_content" id="apply-ckeditor3" required>{{ $data['edit_record']->hindi_content }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Featured Image</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body" style="display: block;">

                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="btn btn-default btn-file">
                                            <i class="fas fa-paperclip"></i> Attachment
                                            <input type="file" name="featured_image" id="featured_image">
                                        </div>
                                        <p class="help-block">Max. 32MB</p>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="hidden" id="hidden_featured_image" value="{{ $data['edit_record']->featured_image }}" name="hidden_featured_image">
                                        @if (!empty($data['edit_record']->featured_image) && File::exists(public_path('storage/place_to_visit/' . $data['edit_record']->featured_image)))
                                            <img src="{{ asset('storage/place_to_visit') . '/' . $data['edit_record']->featured_image }}"
                                                class='img-thumbnail' id="imagePreview"
                                                style="height: 100px; width: 100%; object-fit: cover" />
                                        @else
                                            <img src="{{ asset('assets/admin/dist/img/no-image-placeholder.jpg') }}"
                                                class="img-thumbnail" id="imagePreview"
                                                style="height: 100px; width: 100%; object-fit: cover">
                                        @endif
                                        <div style="text-align:center"><a href="javascript:void(0)" id="remove_featured_image" style="color:red;">Remove</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body" style="display: block;">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select class="form-control" name="type">
                                        <option value="">-- Select--</option>
                                        @foreach ($data['visit_category'] as $items)
                                        <option value="{{ $items }}" <?= $items != $data['edit_record']->type ?: 'selected' ?>>
                                            {{ $items }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" type="button" class="btn btn-block btn-primary">Update</button>
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
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('apply-ckeditor1');
        CKEDITOR.replace('apply-ckeditor2');
        CKEDITOR.replace('apply-ckeditor3');
    </script>

    <script>
        $('#featured_image').change(function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
            $("#remove_featured_image").show();
        });
    </script>

    <script>
        $("#remove_featured_image").click(function(){
            $("#imagePreview").attr("src","{{ asset('assets/admin/dist/img/no-image-placeholder.jpg') }}");
            $("#hidden_featured_image").val('');
            $("#remove_featured_image").hide();
            $('#featured_image').val('');
        });
    </script>

@endsection
