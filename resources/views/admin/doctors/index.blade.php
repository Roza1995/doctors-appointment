@extends('layouts.admin')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Doctors</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href= "{{ route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Doctors</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <p>
                <a href = "{{ route('admin.doctors.create')}}" class = "btn btn-primary">Add new Doctor</a>
            </p>
            <table class = "table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Full Name</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>

                @foreach($doctors as $d)

                    <tr>
                        <td>{{$d->id}}</td>
                        <td><img src = "{{asset('storage/images/'.$d->image)}}" style = "width:200px; height:150px"/></td>
                        <td>{{$d->full_name}}</td>
                        <td>{{$d->position}}</td>
                        <td>{{$d->email}}</td>
                        <td>{{$d->phone_number}}</td>

                        <td><a href = "{{route('admin.doctors.edit', $d->id)}}" class = "btn btn-info">Edit</a>
                            <a href = "javascript:void(0)" onclick = "$(this).parent().find('form').submit()" class = "btn btn-danger">Delete</a>
                            <form method = "post" action = "{{route('admin.doctors.destroy', $d->id)}}">
                                @method('DELETE')
                                @csrf
                            </form>

                        </td>
                    </tr>

                @endforeach
            </table>
                {{$doctors->render()}}
        </div>
    </section>


@endsection
