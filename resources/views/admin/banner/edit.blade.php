@extends('admin.layouts.master')

@section('title', 'Edit | Banner')

@section('page_link_and_styles')
@endsection


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Banner</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/banner') }}" type="button" class="btn btn-primary btn-sm">Manage</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <form action="{{ url('admin/banner/update') }}" method="post" enctype="multipart/form-data">
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
                    <input type="hidden" id="hidden_record_id" value="{{ $data['edit_record']->id }}"
                        name="hidden_record_id">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category" required>
                                                <option value="">-- Select--</option>
                                                @foreach ($data['category'] as $element)
                                                    <option value="{{ $element }}"
                                                        {{ $data['edit_record']->category == $element ? 'selected' : '' }}>
                                                        {{ $element }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" name="title" id="title"
                                                value="{{ $data['edit_record']->title }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" class="form-control" name="description" id="description"
                                                value="{{ $data['edit_record']->description }}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Text On Banner</label>
                                            <select class="form-control" name="show_text" required>
                                                <option value="N" {{ ($data['edit_record']->show_text == 'N')? 'selected': '' }}>N</option>
                                                <option value="Y" {{ ($data['edit_record']->show_text == 'Y')? 'selected': '' }}>Y</option>
                                            </select>
                                        </div>
                                    </div>
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
                                        <div class="form-group">
                                            <div class="btn btn-default btn-file">
                                                <i class="fas fa-paperclip"></i> Attachment
                                                <input type="file" name="featured_image" id="featured_image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="hidden" id="hidden_featured_image"
                                            value="{{ $data['edit_record']->featured_image }}"
                                            name="hidden_featured_image">
                                        @if (
                                            !empty($data['edit_record']->featured_image) &&
                                                File::exists(public_path('storage/banner/' . $data['edit_record']->featured_image)))
                                            <img src="{{ asset('storage/banner') . '/' . $data['edit_record']->featured_image }}"
                                                class='img-thumbnail' id="imagePreview"
                                                style="height: 100px; width: 100%; object-fit: cover" />
                                        @else
                                            <img src="{{ asset('assets/admin/dist/img/no-image-placeholder.jpg') }}"
                                                class="img-thumbnail" id="imagePreview"
                                                style="height: 100px; width: 100%; object-fit: cover">
                                        @endif
                                        <div style="text-align:center"><a href="javascript:void(0)"
                                                id="remove_featured_image" style="color:red;">Remove</a></div>
                                    </div>
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
    <script>
        $('#featured_image').change(function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        });
    </script>

    <script>
        $("#featured_image").change(function() {
            $("#remove_featured_image").show();
        });
        $("#remove_featured_image").click(function() {
            $("#imagePreview").attr("src", "{{ asset('assets/admin/dist/img/no-image-placeholder.jpg') }}");
            $("#remove_featured_image").hide();
            $('#featured_image').val('');
            $('#hidden_featured_image').val('');
        });
    </script>

@endsection
