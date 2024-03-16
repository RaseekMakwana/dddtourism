@extends('admin.layouts.master')

@php
    $segment3 = request()->segment(3);
    $facilities = config('collections.facilities_type_name')
@endphp

@section('title', 'Edit | '.$facilities[$segment3])

@section('page_link_and_styles')
@endsection


@php
    $segment3 = request()->segment(3);
@endphp

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> {{ "Edit ".$facilities[$segment3] }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/diu/facilities') }}" type="button" class="btn btn-primary btn-sm">Manage</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <form action="{{ url('admin/facilities/'.$segment3.'/update') }}" method="post" enctype="multipart/form-data">
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
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $data['edit_record']->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description" id="description" value="{{ $data['edit_record']->description }}">
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" class="form-control" name="location" id="location" value="{{ $data['edit_record']->location }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" name="contact_number" id="contact_number" value="{{ $data['edit_record']->contact_number }}" required>
                                </div>
                            </div>
                        </div>

                        @if($segment3 == "hospital")
                        <section class="card">
                            <div class="card-body">
                                <div class="form-group" >
                                    <label>Type</label>
                                    <select class="form-control" name="tab_option">
                                        <option value="">-- Select--</option>
                                        @foreach($data['hospital_type'] as $element)
                                            <option value="{{ $element }}" {{ ($data['edit_record']->tab_option == $element)? "selected" : "" ; }}>{{ $element }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </section>
                        @endif

                        @if($segment3 == "bars-and-liquor-shops")
                        <section class="card" >
                            <div class="card-body">
                                <div class="form-group" >
                                    <label>Type</label>
                                    <select class="form-control" name="tab_option">
                                        <option value="">-- Select--</option>
                                        @foreach($data['bars_and_liquor_shop_type'] as $element)
                                            <option value="{{ $element }}" {{ ($data['edit_record']->tab_option == $element)? "selected" : "" ; }}>{{ $element }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </section>
                        @endif

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
                                            <p class="help-block">Max. 32MB</p>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="hidden" id="hidden_featured_image" value="{{ $data['edit_record']->featured_image }}" name="hidden_featured_image">
                                        @if (!empty($data['edit_record']->featured_image) && File::exists(public_path('storage/facilities/'.$data['edit_record']->slug.'/'. $data['edit_record']->featured_image)))
                                            <img src="{{ asset('storage/facilities').'/'.$data['edit_record']->slug.'/'.$data['edit_record']->featured_image }}"
                                                class='img-thumbnail' id="imagePreview"
                                                style="height: 100px; width: 100%; object-fit: cover" />
                                        @else
                                            <img src="{{ asset('assets/admin/dist/img/no-image-placeholder.jpg') }}"
                                                class="img-thumbnail" id="imagePreview"
                                                style="height: 100px; width: 100%; object-fit: cover">
                                        @endif
                                        <div style="text-align:center"><a href="javascript:void(0)" id="remove_featured_image" style="color:red;">Remove</a></div>

                                        {{-- <img src="{{ asset('assets/admin/dist/img/no-image-placeholder.jpg') }}" class="img-thumbnail" id="imagePreview"
                                            style="height: 100px; width: 100%; object-fit: cover">
                                        <div style="text-align:center"><a href="javascript:void(0)" id="remove_featured_image" style="color:red; display:none">Remove</a></div> --}}
                                    </div>
                                </div>

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
        });
    </script>

    <script>
        $("#featured_image").change(function(){
            $("#remove_featured_image").show();
        });
        $("#remove_featured_image").click(function(){
            $("#imagePreview").attr("src","{{ asset('assets/admin/dist/img/no-image-placeholder.jpg') }}");
            $("#remove_featured_image").hide();
            $('#featured_image').val('');
            $('#hidden_featured_image').val('');
        });
    </script>

@endsection
