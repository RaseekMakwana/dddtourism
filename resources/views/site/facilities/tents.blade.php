@php
    $segment1 = request()->segment(1);
@endphp

@extends('site.layouts.master')

@section('title', 'Tents - Facilities')

@section('page_link_and_styles')
@endsection

@section('content')

<section class="info-common tent">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 pb-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="facilities.html">Facilities</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tents</li>
                </ol>
            </nav>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-5 col-md-11 col-12 title2 mbs text-center">
                <h2>Tents</h2>
                <p>Diu has a coastal length of 21 kms And the Creator has blessed the island not only with beautiful scenery but also the luxury of flawless beaches. </p>
            </div>
        </div>
        <div class="row">
			<div class="col-lg-9 pr-lg-5 col-md-8 col-12">
                <div class="row">
                    <div class="col-lg-12 btns-green col-md-12 col-12">
                        <input type="hidden" id="hidden_tab_option" value="">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link facility_type" data-tab_option='4 Star'>
                                    4 Star
                                    <span>
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link facility_type" data-tab_option='3 Star'>
                                    3 Star
                                    <span>
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                        <img src="{{ url('assets/site/img/star-white.png') }}" alt="">
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <div class="col-lg-12 mt-3 mb-3 p-0 pb-1 pt-2 col-md-12 col-12">
                            <p id="facility_total_count_message"></p>
                        </div>
                    </div>
                    <div class="col-12" id="master_data_html">

                    </div>
                    <div class="col-12">
                    <div class="row">
                        <div class="col-lg-12 pagi pink mt-0 mb-4 col-md-12 col-12">
                            <ul id="master_pagination"></ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-12">
                @include('site.facilities.side_manu')
            </div>
        </div>
    </div>
</section>

@endsection


@section('page_link_and_javascripts')

<script>
$(document).ready(function(){
    loadMasterData();
});
function loadMasterData(page = 1){
    const formData = new FormData();
    formData.append("state",'{{ request()->segment(1) }}');
    formData.append("facility_type", 'Tents');
    formData.append("tent_type", $("#hidden_tab_option").val());
    formData.append("page_number",page);

    axios.post(axios.defaults.baseURL+'site/facilities/tent/get-data', formData).then(function (response) {
        htmlBuilt(response);
        htmlBuiltPagination(response);
    })
    .catch(function (error) {
        console.log(error);
    });
}

function htmlBuilt(response){
    var response = response.data.data;

    var html='';
    $.each(response,function(index, element) {
        html += '<div class="row bgs pink">';
            html += '<div class="col-lg-5 img col-md-5 col-12">';
                html += '<figure style="background: url('+element.featured_image+') 50% 50% no-repeat; background-size: cover;">';
                    html += '</figure>';
                    html += '</div>';
                    html += '<div class="col-lg-7 rt col-md-7 col-12">';
                        html += '<span class="stars">';
                            if(element.tent_type == "3 Star"){
                                html += '<img src="{{ url("assets/site/img/star-yellow.png") }}" alt="">';
                                html += '<img src="{{ url("assets/site/img/star-yellow.png") }}" alt="">';
                                html += '<img src="{{ url("assets/site/img/star-yellow.png") }}" alt="">';
                            }
                            if(element.tent_type == "4 Star"){
                                html += '<img src="{{ url("assets/site/img/star-yellow.png") }}" alt="">';
                                html += '<img src="{{ url("assets/site/img/star-yellow.png") }}" alt="">';
                                html += '<img src="{{ url("assets/site/img/star-yellow.png") }}" alt="">';
                                html += '<img src="{{ url("assets/site/img/star-yellow.png") }}" alt="">';
                            }
                        html += '</span>';
                        html += '<h4>'+element.title+'</h4>';
                        html += '<p>'+element.description+'</p>';
                        html += '<p class="lbtns">';
                                html += '<a href="#"><img src="{{ url('assets/site/img/icon-hotel-1.png') }}" alt=""></a>';
                                html += '<a href="#"><img src="{{ url('assets/site/img/icon-hotel-2.png') }}" alt=""></a>';
                                html += '<a href="#"><img src="{{ url('assets/site/img/icon-hotel-3.png') }}" alt=""></a>';
                        html += '</p>';
                    html += '<a class="rulesbtn" href="#">Show Rates</a>';
                    html += '<a class="vlocation" href="'+element.location_url+'" target="_blank"><img src="{{ url("assets/site/img/icon-map-pink.png") }}" alt=""> <span>View Location</span></a>';
                html += '</div>';
        html += '</div>';
    });


    $('#master_data_html').html(html);
}

function htmlBuiltPagination(response){
    var meta = response.data.meta;
    var html = '';
    if(meta.total != "0"){
        for (var i = 1; i <= meta.last_page; i++) {
            if(meta.current_page == i){
                html += '<li><a class="active" onclick="facilitiesPagination('+i+')">'+i+'</a></li>';
            } else {
                html += '<li><a onclick="facilitiesPagination('+i+')">'+i+'</a></li>';
            }
        }
        $("#master_pagination").html(html);
        $("#facility_total_count_message").text(meta.total+" - Tents in {{ ucfirst($segment1) }}");
    } else {
        $("#master_pagination").html("");
        $("#facility_total_count_message").text("Data not found");
    }

}

function facilitiesPagination(page){
    loadMasterData(page);
    skipToMainContent();
}

$(".facility_type").click(function(){
    $(".facility_type").removeClass('active');
    $(this).addClass('active');

    $("#hidden_tab_option").val($(this).data('tab_option'));
    loadMasterData();
});
</script>


@endsection
