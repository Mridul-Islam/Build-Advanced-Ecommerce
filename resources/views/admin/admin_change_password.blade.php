@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Change Password Page</h4><br><br>

                @if (count($errors) > 0)
                    @foreach ($errors->all() as $the_error)
                        <p class="alert alert-danger alert-dissmissble fade show">{{ $the_error }}</p>
                    @endforeach
                @endif

                <form action="{{ route('update.password') }}" method="post">
                    @csrf

                    <div class="row mb-3">
                        <label for="oldPassword" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                            <input name="old_password" class="form-control" type="password" id="oldPassword" value="">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input name="new_password" class="form-control" type="password" id="newPassword" value="">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="confimrPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input name="confirm_password" class="form-control" type="password" id="confimrPassword" value="">
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" value="Change Password" class="btn btn-info waves-effect waves-light">

                </form>
                <!-- End form -->

            </div>
        </div>
    </div> <!-- end col -->
</div>


<script>



</script>

@endsection
