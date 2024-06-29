@extends('admin.app')
@section('title')
    {{ isset($pageTitle) ? $pageTitle : 'Complains' }}
@endsection

@push('styles')
    <link href="{{ asset('/') }}assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <div class="d-flex">
                            <a href="{{ route('admin.complain.create') }}" class="btn btn-primary">Create Complain</a>
                        </div>
                    </div>
                    <h4 class="page-title">Complain List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h4>Complains</h4>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-2 content-end">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                @if (\Illuminate\Support\Facades\Auth::user()->role == 5)
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Division</label>
                                            <select name="division" class="form-select" id="division">
                                                <option value="">Select One</option>
                                                @foreach ($divisions as $division)
                                                    <option {{ request('division') == $division->id ? 'selected' : '' }}
                                                        value="{{ $division->id }}">{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">District</label>
                                            <select name="district" class="form-select" id="district">
                                                <option value="">Select One</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Upazila</label>
                                            <select name="upazila" class="form-select" id="sub_district">
                                                <option value="">Select One</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--                                    <div class="col-md-2"> --}}
                                    {{--                                        <div class="mb-3"> --}}
                                    {{--                                            <label class="form-label">Date Range</label> --}}
                                    {{--                                            <input type="text" name="date" class="form-control date" --}}
                                    {{--                                                   id="singledaterange" data-toggle="date-picker" --}}
                                    {{--                                                   data-cancel-class="btn-warning"> --}}
                                    {{--                                        </div> --}}
                                    {{--                                    </div> --}}
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label">Start Date</label>
                                            <input type="date" name="start_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label">Start Date</label>
                                            <input type="date" name="end_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <button type="submit" name="submit" value="search"
                                                class="btn btn-primary mt-3 ps-3 pe-3">Search
                                            </button>
                                            <button type="submit" name="export" value="export"
                                                class="btn btn-warning mt-3 ms-2 ps-3 pe-3">Export
                                            </button>

                                        </div>
                                    </div>
                                @endif

                                @if (\Illuminate\Support\Facades\Auth::user()->role == 4)
                                    <div id="division_area">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Division</label>
                                                <select name="division" class="form-select" id="division">
                                                    <option value="">Select One</option>
                                                    @foreach ($divisions as $division)
                                                        <option
                                                            {{ \Illuminate\Support\Facades\Auth::user()->division_id == $division->id ? 'selected' : '' }}
                                                            value="{{ $division->id }}">{{ $division->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">District</label>
                                            <select name="district" class="form-select" id="district">
                                                <option value="">Select One</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Upazila</label>
                                            <select name="upazila" class="form-select" id="sub_district">
                                                <option value="">Select One</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--                                    <div class="col-md-2"> --}}
                                    {{--                                        <div class="mb-3"> --}}
                                    {{--                                            <label class="form-label">Date Range</label> --}}
                                    {{--                                            <input type="text" name="date" class="form-control date" --}}
                                    {{--                                                   id="singledaterange" data-toggle="date-picker" --}}
                                    {{--                                                   data-cancel-class="btn-warning"> --}}
                                    {{--                                        </div> --}}
                                    {{--                                    </div> --}}
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label">Start Date</label>
                                            <input type="date" name="start_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label">Start Date</label>
                                            <input type="date" name="end_date" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <button type="submit" name="submit" value="search"
                                                class="btn btn-primary mt-3 ps-3 pe-3">Search
                                            </button>
                                            <button type="submit" name="export" value="export"
                                                class="btn btn-warning mt-3 ms-2 ps-3 pe-3">Export
                                            </button>

                                        </div>
                                    </div>
                                @endif
                                @if (\Illuminate\Support\Facades\Auth::user()->role == 3)
                                    <div id="division_area">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Division</label>
                                                <select name="division" class="form-select" id="division">
                                                    <option value="">Select One</option>
                                                    @foreach ($divisions as $division)
                                                        <option
                                                            {{ \Illuminate\Support\Facades\Auth::user()->division_id == $division->id ? 'selected' : '' }}
                                                            value="{{ $division->id }}">{{ $division->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">District</label>
                                                <select name="district" class="form-select" id="district">
                                                    <option value="">Select One</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Upazila</label>
                                            <select name="upazila" class="form-select" id="sub_district">
                                                <option value="">Select One</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--                                    <div class="col-md-2"> --}}
                                    {{--                                        <div class="mb-3"> --}}
                                    {{--                                            <label class="form-label">Date Range</label> --}}
                                    {{--                                            <input type="text" name="date" class="form-control date" --}}
                                    {{--                                                   id="singledaterange" data-toggle="date-picker" --}}
                                    {{--                                                   data-cancel-class="btn-warning"> --}}
                                    {{--                                        </div> --}}
                                    {{--                                    </div> --}}
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label">Start Date</label>
                                            <input type="date" name="start_date" value="{{ request()->start_date }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label">End Date</label>
                                            <input type="date" name="end_date" value="{{ request('end_date') }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <button type="submit" name="submit" value="search"
                                                class="btn btn-primary mt-3 ps-3 pe-3">Search
                                            </button>
                                        </div>
                                    </div>
                                @endif


                            </div>
                        </form>
                        <table id="datatable-buttons"
                            class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>District</th>
                                    <th>Upazila</th>
                                    <th>Union</th>
                                    <th>Remark</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->application_date }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->mobile }}</td>
                                        <td>{{ $data->subject }}</td>
                                        <td>{{ $data->district->name }}</td>
                                        <td>{{ $data->upazila->name }}</td>
                                        <td>{{ $data->union->name }}</td>
                                        <td>{{ $data->remark }}</td>
                                        <td>
                                            @if ($data->status == 1)
                                                <span class="btn btn-info btn-sm">Pending</span>
                                            @elseif ($data->status == 2)
                                                <span class="btn btn-success btn-sm">Completed</span>
                                            @elseif ($data->status == 3)
                                                <span class="btn btn-danger btn-sm">Canceled</span>
                                            @else
                                                <span class="btn btn-danger btn-sm">Inactive</span>
                                            @endif
                                            <br>
                                            <button class="btn btn-primary btn-sm mt-1 status-btn" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop" data-complain-id="{{ $data->id }}"
                                                data-status="{{ $data->status }}">Change Status</button>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.complain.view', $data->id) }}"
                                                class="btn btn-primary btn-sm">VIEW</a>
                                            @if (\Illuminate\Support\Facades\Auth::id() == $data->created_by)
                                                <a href="{{ route('admin.complain.edit', $data->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                            @endif

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ @$datas->links('pagination::bootstrap-4') }}
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

        </div>
        <!-- end row -->

    </div>


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.complain.note-store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="complain_id" id="complain_id">
                        <label for="">Select Status</label>
                        <select name="status" id="" class="form-select">
                            <option value="">select one</option>
                            <option value="1">Pending</option>
                            <option value="2">Completed</option>
                            <option value="3">Canceled</option>
                        </select>
                        <label for="" class="mt-1">Note</label>
                        <textarea name="note" id="" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('.status-btn').on('click', function() {
                var complain_id = $(this).attr('data-complain-id');
                $('#complain_id').val(complain_id);
            });
        });


        $(function() {
            var districtSelected =
                '{{ request('district', \Illuminate\Support\Facades\Auth::user()->district_id) }}'
            $('#division').on('change', function() {
                var division_id = $(this).val();
                $('#district').html('<option value="">Select district</option>');

                $.ajax({
                    method: "GET",
                    url: '{{ route('get.district') }}',
                    data: {
                        division_id: division_id
                    }
                }).done(function(data) {
                    $.each(data, function(index, item) {
                        if (districtSelected == item.id) {
                            $('#district').append('<option selected value="' + item.id +
                                '" selected>' + item.name + '</option>');
                        } else {
                            $('#district').append('<option value="' + item.id + '">' + item
                                .name + '</option>');
                        }
                    });

                    $('#district').trigger('change');
                });

            });

            // personal address
            $('#division').trigger('change');
            var subDistrictSelected = '{{ request('upazila') }}';
            $('#district').on('change', function() {
                var district_id = $(this).val();
                $('#sub_district').html('<option value="">Select sub district</option>');
                if (district_id != '' && district_id != null) {
                    $.ajax({
                        method: "GET",
                        url: '{{ route('get.sub_district') }}',
                        data: {
                            district_id: district_id
                        }
                    }).done(function(data) {
                        $.each(data, function(index, item) {
                            if (subDistrictSelected == item.id) {
                                $('#sub_district').append('<option selected value="' + item
                                    .id +
                                    '" selected>' + item.name + '</option>');
                            } else {
                                $('#sub_district').append('<option value="' + item.id +
                                    '">' +
                                    item.name + '</option>');
                            }
                        });
                    });
                }
            });
            $('#district').trigger('change');
            var unionSelected = '{{ old('union') }}';
            $('#sub_district').on('change', function() {
                var sub_district_id = $(this).val();
                $('#union').html('<option value="">Select union</option>');
                if (sub_district_id != '' && sub_district_id != null) {
                    $.ajax({
                        method: "GET",
                        url: '{{ route('get.unions') }}',
                        data: {
                            sub_district_id: sub_district_id
                        }
                    }).done(function(data) {
                        $.each(data, function(index, item) {
                            if (unionSelected == item.id) {
                                $('#union').append('<option selected value="' + item
                                    .id +
                                    '" selected>' + item.name + '</option>');
                            } else {
                                $('#union').append('<option value="' + item.id +
                                    '">' +
                                    item.name + '</option>');
                            }
                        });
                    });
                }
            });
            $('#sub_district').trigger('change');
            $('#division_area').hide()
        });
    </script>
@endpush
