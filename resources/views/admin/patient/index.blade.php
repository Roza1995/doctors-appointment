@extends('layouts.admin')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Make an appointment</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href= "{{ route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Patient</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">

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
                        <td><a href = "{{route('event', $d->id)}}" class = "btn btn-primary">Appointment</a>

                        </td>
                    </tr>

                @endforeach
            </table>
            {{$doctors->render()}}
        </div>
    </section>


@endsection

