@extends('admin.layouts.master')

@section('title', 'Posts')

@section('page_link_and_styles')
@endsection


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Posts</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/diu/posts/create') }}" type="button" class="btn btn-success btn-sm">Create</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">

        </div>
        <div class="card">
            <div class="col-md-12">
                sdfasd
            </div>
        </div>
        </div>

    </section>
    <!-- /.content -->
@endsection

@section('page_link_and_javascripts')
<script>

    // const formData = new FormData();
    // formData.append("from_date","");

    // axios.post('/admin/posts/get-data', {
    //     data: formData
    // })
    // .then(function (response) {
    //     var  response = response.data.data;
    //     console.log(response);
    // })
    // .catch(function (error) {
    //     console.log(error);
    // });


</script>

@endsection

