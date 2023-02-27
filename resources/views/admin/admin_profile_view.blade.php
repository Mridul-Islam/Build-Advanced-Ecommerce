@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <center><br><br>
                <img class="rounded-circle avatar-xl" src="{{ asset('assets/images/small/img-5.jpg') }}" alt="Card image cap">
            </center>
            <div class="card-body">
                <h4 class="card-title">Name: {{ $admin_data->name }}</h4>
                <hr>
                <h4 class="card-title">User Email: {{ $admin_data->email }}</h4>
                <hr>
                <h4 class="card-title">User Name: {{ $admin_data->username }}</h4>
                <hr>

                <a href="{{ route('admin.edit_profile') }}" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>

            </div>
        </div>
    </div>
</div>

@endsection






