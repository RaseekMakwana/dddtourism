@extends('admin.layouts.master')

@section('title', 'Edit | Top Attraction')

@section('page_link_and_styles')
@endsection


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit | {{ $data['edit_record']->english_title }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/top-attraction') }}" type="button" class="btn btn-primary btn-sm">Manage</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ url('admin/top-attraction/update') }}" method="post" enctype="multipart/form-data">
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
                                    <label>Description</label>
                                    <textarea class="form-control" rows="100" name="english_content" id="english_content" required>{{ $data['edit_record']->english_content }}</textarea>
                                </div>
                                <div class="form-group top_attractions">
                                    <label>Sort Description</label>
                                    <input type="text" class="form-control" name="english_sort_content" id="english_sort_content" value="{{ $data['edit_record']->english_sort_content }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Tag Title</label>
                                    <input type="text" class="form-control" name="english_tag" id="english_tag" value="{{ $data['edit_record']->english_tag }}" required>
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
                                    <label>Description</label>
                                    <textarea class="form-control" rows="100" name="gujarati_content" id="gujarati_content" required>{{ $data['edit_record']->gujarati_content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Sort Description</label>
                                    <input type="text" class="form-control" name="gujarati_sort_content" id="gujarati_sort_content" value="{{ $data['edit_record']->gujarati_sort_content }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Tag Title</label>
                                    <input type="text" class="form-control" name="gujarati_tag" id="gujarati_tag" value="{{ $data['edit_record']->gujarati_tag }}" required>
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
                                    <label>Description</label>
                                    <textarea class="form-control" rows="100" name="hindi_content" id="hindi_content" required>{{ $data['edit_record']->hindi_content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Sort Description</label>
                                    <input type="text" class="form-control" name="hindi_sort_content" id="hindi_sort_content" value="{{ $data['edit_record']->hindi_sort_content }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Tag Title</label>
                                    <input type="text" class="form-control" name="hindi_tag" value="{{ $data['edit_record']->hindi_tag }}" id="hindi_tag" required>
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
                                        @if (!empty($data['edit_record']->featured_image) && File::exists(public_path('storage/top_attraction/' . $data['edit_record']->featured_image)))
                                            <img src="{{ asset('storage/top_attraction') . '/' . $data['edit_record']->featured_image }}"
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
                        {{-- <div class="card">
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
                                    <label>Categories</label>
                                    <select class="form-control" name="category_id" required>
                                        <option value="">-- Select--</option>
                                        @foreach ($data['categories'] as $items)
                                            <option value="{{ $items->id }}"
                                                <?= $items->id != $data['edit_record']->category_id ?: 'selected' ?>>
                                                {{ $items->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> --}}
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
        CKEDITOR.replace('english_content');
        CKEDITOR.replace('gujarati_content');
        CKEDITOR.replace('hindi_content');
    </script>

    <script type="text/javascript">
        $('form[id="actionForm"]').validate({
            submitHandler: function(form) {
                form.submit();
            }
        });
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
