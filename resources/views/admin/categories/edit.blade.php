@extends('admin.layouts.master')

@section('title', 'Edit | Category')

@section('page_link_and_styles')
@endsection


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Category </h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/categories') }}" type="button" class="btn btn-primary btn-sm">Manage</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <form action="{{ url('admin/categories/update') }}" method="post" enctype="multipart/form-data">
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" id="category_name" value="{{ $data['edit_record']->category_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" name="description" >{{ $data['edit_record']->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Parent Category</label>
                                    <select class="form-control" name="parent_category_id">
                                        <option value="">-- Select--</option>
                                        @foreach ($data['categories'] as $items)
                                            <option value="{{ $items->id }}" {{ ($items->id != $data['edit_record']->parent_id)?: "selected" ; }}> {{ $items->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">

                            </div>
                        </div>
                    </div> --}}
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->
@endsection

@section('page_link_and_javascripts')
@endsection
