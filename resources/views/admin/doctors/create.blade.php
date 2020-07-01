@extends('layouts.admin')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Doctor</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href= "{{ route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Doctors</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <form method = "post" action = "{{route('admin.doctors.store')}}" enctype = "multipart/form-data">
                @csrf
                <div class = "form-group">
                    <div class = "row">
                        <label class = "col-md-4">Full Name</label>
                        <div class = "col-md-7"><input type = "text" name = "full_name" class = "form-control"></div>
                        <div class = "clearfix"></div>
                        <label class = "col-md-4">Position</label>
                        <div class = "col-md-7"><input type = "text" name = "position" class = "form-control"></div>
                        <div class = "clearfix"></div>
                        <label class = "col-md-4">Email</label>
                        <div class = "col-md-7"><input type = "text" name = "email" class = "form-control"></div>
                        <div class = "clearfix"></div>
                        <label class = "col-md-4">Phone number</label>
                        <div class = "col-md-7"><input type = "text" name = "phone_number" class = "form-control"></div>
                        <div class = "clearfix"></div>
                        <label class = "col-md-4">Image</label>
                        <div class = "col-md-7"><input type = "file" name = "image" class = "btn btn-info">
                        </div>
                        <div class = "clearfix"></div>
                    </div>
                </div>
                <div class = "form-group">
                    <input type = "submit" class = "btn btn-info" value = "Save">
                </div>

            </form>
        </div>
    </section>


@endsection
