@extends('admin.admin_master')

@section('admin')

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit Profile Page</h4>

                <form action="">

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input name="name" class="form-control" type="text" id="example-text-input" value="{{ $edit_data->name }}">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input name="email" class="form-control" type="email" id="example-text-input" value="{{ $edit_data->email }}">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">UserName</label>
                        <div class="col-sm-10">
                            <input name="username" class="form-control" type="text" id="example-text-input" value="{{ $edit_data->username }}">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <input name="profile_image" class="form-control" type="file" id="image">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" src="{{ asset('assets/images/small/img-5.jpg') }}" alt="Admin Image" id="showImage">
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" value="Update Profile" class="btn btn-info waves-effect waves-light">

                </form>
                <!-- End form -->

            </div>
        </div>
    </div> <!-- end col -->
</div>


<script>

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection
