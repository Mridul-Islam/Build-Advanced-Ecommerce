@extends('admin.admin_master')

@section('admin')

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Multi Image All</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Multi Image All</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>About Multi Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>

                        @php
                            $serial_number = 1;
                        @endphp

                        @foreach ($all_multi_image as $the_image)
                            <tr>
                                <td>{{ $serial_number }}</td>
                                <td>
                                    <img src="{{ asset($the_image->multi_image) }}" alt="" width="60" height="50">
                                </td>
                                <td>
                                    <a href="{{ route('edit.multi_image', $the_image->id) }}" class="btn btn-info sm" title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="" class="btn btn-danger sm" title="Delete Data">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $serial_number++;
                            @endphp
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


@endsection



