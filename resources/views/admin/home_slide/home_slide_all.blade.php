@extends('admin.admin_master')

@section('admin')

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Home Slide Page</h4><br><br>

                <form action="{{ route('home_slide.update', $home_slide->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row mb-3">
                        <label for="home-title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input name="title" class="form-control" type="text" id="home-title" value="{{ $home_slide->title }}">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="short-title" class="col-sm-2 col-form-label">Short Title</label>
                        <div class="col-sm-10">
                            <input name="short_title" class="form-control" type="text" id="short-title" value="{{ $home_slide->short_title }}">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="video-url" class="col-sm-2 col-form-label">Video Url</label>
                        <div class="col-sm-10">
                            <input name="video_url" class="form-control" type="text" id="video-url" value="{{ $home_slide->video_url }}">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">Slider Image</label>
                        <div class="col-sm-10">
                            <input name="slider_image" class="form-control" type="file" id="image">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" src="{{ $home_slide->home_slide != "" ? asset($home_slide->home_slide) : asset('images/no_image.jpg') }}" alt="Slider Image" id="showImage">
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" value="Update Slide" class="btn btn-info waves-effect waves-light">

                </form>
                <!-- End form -->

            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection



@section('script')

    @include('admin.includes.show_uploaded_image')

@endsection
