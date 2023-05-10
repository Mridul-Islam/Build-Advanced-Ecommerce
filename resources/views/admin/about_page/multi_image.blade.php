@extends('admin.admin_master')

@section('admin')

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Add Multi Image</h4><br><br>

                <form action="{{ route('about.store_multi_image') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">About Multi Image</label>
                        <div class="col-sm-10">
                            <input name="multi_image[]" class="form-control" type="file" id="image" multiple>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" src="{{  asset('images/no_image.jpg') }}" alt="Slider Image" id="showImage">
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" value="Update Multi Image" class="btn btn-info waves-effect waves-light">

                </form>
                <!-- End form -->

                <!-- End form -->

            </div>
        </div>
    </div> <!-- end col -->
</div>


@endsection



@section('script')

    @include('admin.includes.show_uploaded_image')

@endsection
