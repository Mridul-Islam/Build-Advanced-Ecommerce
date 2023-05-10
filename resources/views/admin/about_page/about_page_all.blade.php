@extends('admin.admin_master')

@section('admin')

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">About Page</h4><br><br>

                <form action="{{ route('about.update', $about_slider->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row mb-3">
                        <label for="about-title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input name="about_title" class="form-control" type="text" id="about-title" value="{{ $about_slider->title }}">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="short-title" class="col-sm-2 col-form-label">Short Title</label>
                        <div class="col-sm-10">
                            <input name="short_title" class="form-control" type="text" id="short-title" value="{{ $about_slider->short_title }}">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="video-url" class="col-sm-2 col-form-label">Short Description</label>
                        <div class="col-sm-10">
                            <textarea name="short_description" required="" class="form-control" rows="5">{{ $about_slider->short_description }}</textarea>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="video-url" class="col-sm-2 col-form-label">Long Description</label>
                        <div class="col-sm-10">
                            <textarea id="elm1" name="long_description">{{ $about_slider->long_description }}</textarea>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">About Image</label>
                        <div class="col-sm-10">
                            <input name="about_image" class="form-control" type="file" id="image">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" src="{{ $about_slider->about_image != "" ? asset($about_slider->about_image) : asset('images/no_image.jpg') }}" alt="Slider Image" id="showImage">
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" value="Update Slide" class="btn btn-info waves-effect waves-light">

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
