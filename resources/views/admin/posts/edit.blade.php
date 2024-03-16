@extends('admin.layouts.master')

@section('title', 'Edit | Posts')

@section('page_link_and_styles')
@endsection


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Post  {{ $data['edit_record']->title }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/diu/posts') }}" type="button" class="btn btn-primary btn-sm">Manage</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ url('admin/diu/posts/update') }}" method="post" enctype="multipart/form-data">
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
                        <div class="card">
                            <div class="card-body">
                                {{-- <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" required>
                            </div> --}}

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ $data['edit_record']->title }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="100" name="description" id="apply-ckeditor" required>{{ $data['edit_record']->description }}</textarea>
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
                                        @if (!empty($data['edit_record']->featured_image) && File::exists(public_path('storage/posts/' . $data['edit_record']->featured_image)))
                                            <img src="{{ asset('storage/posts') . '/' . $data['edit_record']->featured_image }}"
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
                            <div class="card-header">
                                <h3 class="card-title">Categories</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body" style="display: block;">
                                <div class="form-group">
                                    {{-- <label>Categories</label> --}}
                                    <select class="form-control" name="category_id">
                                        <option value="">-- Select--</option>
                                        @foreach ($data['categories'] as $items)
                                            <option value="{{ $items->id }}"
                                                <?= $items->id != $data['edit_record']->category_id ?: 'selected' ?>>
                                                {{ $items->category_name }}</option>
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
        CKEDITOR.replace('apply-ckeditor');
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
