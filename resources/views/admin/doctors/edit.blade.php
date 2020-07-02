@extends('layouts.admin')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Doctors Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href= "{{ route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Doctors Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <form method = "post" action = "{{route('admin.doctors.update', $doctors->id?? '')}}" enctype = "multipart/form-data">
                @method('PUT')
                @csrf
                <div class = "form-group">
                    <div class = "row">
                        <label class = "col-md-4" for ="name">Full Name</label>
                        <div class = "col-md-7"><input type = "text" name = "full_name" class = "form-control"
                                                       value = "{{$doctors->full_name?? ''}}" id = "name"></div>

                        <label class = "col-md-4" for = "position">Position</label>
                        <div class = "col-md-7"><input type = "text" name = "position" class = "form-control"
                                                       value = "{{$doctors->position?? ''}}" id = "position"></div>

                        <label class = "col-md-4" for = "email">Email</label>
                        <div class = "col-md-7"><input type = "text" name = "email" class = "form-control"
                                                       value = "{{$doctors->email?? ''}}" id = "email"></div>

                        <label class = "col-md-4" for = "phone">Phone number</label>
                        <div class = "col-md-7"><input type = "text" name = "phone_number" class = "form-control"
                                                       value = "{{$doctors->phone_number?? ''}}" id = "phone"></div>

                        <label class = "col-md-4" for = "image">Image</label>
                        <div class = "col-md-7"><input type = "file" name = "image" class = "btn btn-info"
                                                       value = "{{$doctors->image?? ''}}" id = "image"></div>
                        <div class = "clearfix"></div>
                    </div>
                </div>
                <div class = "form-group">
                    <input type = "submit" class = "btn btn-info" value = "Update">
                </div>

            </form>
        </div>
    </section>


@endsection
