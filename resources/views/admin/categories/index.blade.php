@extends('admin.layouts.master')

@section('title', 'Categories')

@section('page_link_and_styles')
@endsection


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/categories/create') }}" type="button" class="btn btn-success btn-sm">Create</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
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
        <div class="card">
            <div class="card-body">
                    <table id="master_table" class="table table-hover table-sm" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>Parent Category</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
            </div>

        </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('page_link_and_javascripts')
<script>


    var table = $("#master_table").DataTable({
        "bDestroy": true,
        "responsive": true,
        "ajax": {
            "url": axios.defaults.baseURL+"admin/categories/get-data",
            "data": {},
            "type": "POST",
            "beforeSend": function (xhr) {},
            "dataSrc": "data",
        },
        "columnDefs": [
            { "width": "1%", "targets": 0 }, // ID column width set to 20%
            { "width": "70%", "targets": 1 }, // Name column width set to 40%
            { "width": "20%", "targets": 1 }, // Name column width set to 40%
            { "width": "10%", "targets": 1 }, // Name column width set to 40%
        ],
        "columns": [
            {
                "data": "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { 'data': 'category_name' },
            { 'data': 'parent_category_name' },
            { 'data': 'created_at' },
            {
                'data': 'id',
                render: function ( data, type, row ) {
                    var html = '<a href="{{ url("admin/categories/edit") }}/'+row.id+'" class="" ><i class="fas fa-edit"></i></a> | ';
                        html += ' <a href="{{ url("admin/categories/destroy") }}/'+row.id+'" class="text-danger" onclick="return confirm(\'Are you sure you want to delete this record?\');"><i class="fa fa-trash"></i></a>';
                    return html;
                }
            },
        ]
    });
</script>

@endsection
