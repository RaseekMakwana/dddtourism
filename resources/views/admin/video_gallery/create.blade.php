@extends('admin.layouts.master')

@section('title', 'Create | Video Gallery')

@section('page_link_and_styles')

@endsection


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Video Gallery </h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/video-gallery') }}" type="button" class="btn btn-primary btn-sm">Manage</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <form action="{{ url('admin/video-gallery/store') }}" method="post" enctype="multipart/form-data" id="actionForm">
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="english_title">English Title</label>
                                            <input type="text" class="form-control" name="english_title" id="english_title"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gujarati_title">Gujarati Title</label>
                                            <input type="text" class="form-control" name="gujarati_title" id="gujarati_title"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="hindi_title">Hindi Title</label>
                                            <input type="text" class="form-control" name="hindi_title" id="hindi_title"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>Video Type</label>
                                            <select class="form-control" name="video_type" id="video_type">
                                                <option value="Video">Video</option>
                                                <option value="Shorts">Shorts</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="youtube_video_url">Youtube video url</label>
                                            <input type="text" class="form-control" name="youtube_video_url" id="youtube_video_url" placeholder="https://www.youtube.com/watch?v=xxxxxxxx" required>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="event_date">Event Date</label>
                                            <input type="date" class="form-control" name="event_date" max="{{ date('Y-m-d') }}" id="event_date"  required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="event_date">Preview</label>
                                        <div id="imagePreview">
                                            <img src="{{ asset('assets/common/placeholder-image.png') }}" class="img-thumbnail" style="width: 100%; height: 200px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" type="button" class="btn btn-primary">Submit</button>
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
                form.submit();
            }
        });
    </script>

    <script>
        $("#youtube_video_url").change(function(){
            getYoutubeThumnbail();
        });
    </script>

    <script>
        $("#video_type").change(function(){
            if($(this).val() == "Video"){
                $("#youtube_video_url").attr("placeholder","https://www.youtube.com/watch?v=xxxxxxxx")
            } else {
                $("#youtube_video_url").attr("placeholder","https://www.youtube.com/shorts/xxxxxxxxxx")
            }
            getYoutubeThumnbail();
        });
    </script>

    <script>
        function getYoutubeThumnbail(){
            if($("#video_type").val() == "Video"){
                var pathString = $('#youtube_video_url').val();
                var pathArray = pathString.split("?v=");
                var url = "https://img.youtube.com/vi/"+pathArray[1]+"/mqdefault.jpg";
                $("#imagePreview").find('img').attr('src',url);
            } else {
                var pathString = $('#youtube_video_url').val();
                var pathArray = pathString.split("shorts/");
                var url = "https://img.youtube.com/vi/"+pathArray[1]+"/mqdefault.jpg";
                $("#imagePreview").find('img').attr('src',url);
            }
        }
    </script>

@endsection
