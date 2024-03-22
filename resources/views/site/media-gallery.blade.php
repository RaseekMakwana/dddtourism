@extends('site.layouts.master_diu')

@section('title', 'Media Gallery')

@section('page_link_and_styles')
@endsection

@section('content')

    <section class="info-common gallery">
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 pb-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                    </ol>
                </nav>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5 col-md-11 col-12 title2 mbs text-center">
                    <h2>Gallery</h2>
                    <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with beautiful
                        scenery but also the luxury of flawless beaches. </p>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12 btns-green col-md-12 col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">
                                Photo Gallery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">
                                Video Gallery
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row sppr" id="photo_gallery_html">
                            </div>
                            <div class="row">
                                <div class="col-lg-12 pagi grey mt-3 col-md-12 col-12">
                                    <ul id="photo_gallery_pagination">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row sppr" id="video_gallery_html">

                            </div>
                            <div class="row">
                                <div class="col-lg-12 pagi grey mt-3 col-md-12 col-12">
                                    <ul id="video_gallery_pagination">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('page_link_and_javascripts')

{{-- PHOTO GALLERY SECTION START --}}
<script>
    $(document).ready(function() {
        $("#photo_gallery_html").html('<div class="col-md-12"><p style="text-align:center; margin: 40px 0px 0px"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Loading</p></div>');
        $("#video_gallery_html").html('<div class="col-md-12"><p style="text-align:center; margin: 40px 0px 0px"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Loading</p></div>');
        loadPhotoGalleryData();
    });

    function loadPhotoGalleryData(page = 1) {
        const formData = new FormData();
        formData.append("state", '{{ request()->segment(1) }}');
        formData.append("page_number", page);
        formData.append("language", '{{ session('locale') }}');




        axios.post(axios.defaults.baseURL + 'site/photo-gallery', formData).then(function(response) {
            htmlPhotoGalleryBuilt(response);
            htmlPhotoGalleryBuiltPagination(response);
        })
        .catch(function(error) {
            console.log(error);
        });
    }

    function htmlPhotoGalleryBuilt(response) {
        var response = response.data.data;

        var html = '';
        $.each(response, function(index, element) {
            html += '<div class="col-lg-4 col-md-4 col-12">';
                html += '<a href="{{ route("site.diu.media.gallery.details") }}/'+element.id+'">';
                html += '<div class="gallerybox">';
                html += '<figure style="background: url(\''+element.featured_image+'\') 50% 50% no-repeat; background-size: cover;"></figure>';
                    html += '<div class="align">';
                        html += '<h4>'+element.title+'</h4>';
                        html += '<span class="date">'+element.event_date+'</span>';
                    html += '</div>';
                html += '</div>';
                html += '</a>';
            html += '</div>';
        });


        $('#photo_gallery_html').html(html);
    }

    function htmlPhotoGalleryBuiltPagination(response) {
        var meta = response.data.meta;
        var html = '';
        if (meta.total != "0") {
            for (var i = 1; i <= meta.last_page; i++) {
                if (meta.current_page == i) {
                    html += '<li><a class="active" onclick="PhotoGalleryPagination(' + i + ')">' + i + '</a></li>';
                } else {
                    html += '<li><a onclick="PhotoGalleryPagination(' + i + ')">' + i + '</a></li>';
                }
            }
            $("#photo_gallery_pagination").html(html);
        } else {
            $("#photo_gallery_pagination").html("");
        }
    }

    function PhotoGalleryPagination(page) {
        $("#photo_gallery_html").html('<div class="col-md-12"><p style="text-align:center; margin: 40px 0px 0px"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Loading</p></div>');
        loadPhotoGalleryData(page);
        skipToMainContent();
    }
</script>
{{-- PHHOTO GALLERY SECTION END --}}

{{-- VIDEO GALLERY SECTION START --}}
<script>
    $(document).ready(function() {
        loadVideoGalleryData();
    });

    function loadVideoGalleryData(page = 1) {
        const formData = new FormData();
        formData.append("state", '{{ request()->segment(1) }}');
        formData.append("page_number", page);
        formData.append("language", '{{ session('locale') }}');

        axios.post(axios.defaults.baseURL + 'site/video-gallery', formData).then(function(response) {
            htmlVideoGalleryBuilt(response);
            htmlVideoGalleryBuiltPagination(response);
        })
        .catch(function(error) {
            console.log(error);
        });
    }

    function htmlVideoGalleryBuilt(response) {
        var response = response.data.data;

        var html = '';
        $.each(response, function(index, element) {
            html += '<div class="col-lg-4 col-md-4 col-12">';
                html += '<div class="gallerybox">';
                html += '<figure style="background: url('+element.featured_image+') 50% 50% no-repeat; background-size: cover;"></figure>';
                    html += '<div class="align">';
                        html += '<h4>'+element.title+'</h4>';
                        html += '<span class="date">'+element.event_date+'</span>';
                    html += '</div>';
                html += '</div>';
            html += '</div>';
        });


        $('#video_gallery_html').html(html);
    }

    function htmlVideoGalleryBuiltPagination(response) {
        var meta = response.data.meta;
        var html = '';
        if (meta.total != "0") {
            for (var i = 1; i <= meta.last_page; i++) {
                if (meta.current_page == i) {
                    html += '<li><a class="active" onclick="VideoGalleryPagination(' + i + ')">' + i + '</a></li>';
                } else {
                    html += '<li><a onclick="VideoGalleryPagination(' + i + ')">' + i + '</a></li>';
                }
            }
            $("#video_gallery_pagination").html(html);
        } else {
            $("#video_gallery_pagination").html("");
        }
    }

    function VideoGalleryPagination(page) {
        $("#video_gallery_html").html('<div class="col-md-12"><p style="text-align:center; margin: 40px 0px 0px"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Loading</p></div>');
        loadVideoGalleryData(page);
        skipToMainContent();
    }
</script>
{{-- VIDEO GALLERY SECTION END --}}

@endsection
