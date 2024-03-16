@extends('admin.layouts.master')

@section('title', 'Change Password')

@section('page_link_and_styles')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chanage Password</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Chanage Password</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (Session::has('success_message'))
                <div class="alert alert-success">
                    {{ Session::get('success_message') }}
                </div>
            @endif
            <div class="card">
                <form action="{{ url('admin/diu/authentication/update-password') }}" method="post" id="changePasswordForm">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('page_link_and_javascripts')
    <script type="text/javascript">
        $('form[id="changePasswordForm"]').validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                }
            },
            messages: {
                password: {
                    required: "Please enter a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                confirm_password: {
                    required: "Please enter a confirm password",
                    minlength: "Your password must be at least 6 characters long",
                    equalTo: "Please enter the same password as above"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>
@endsection
