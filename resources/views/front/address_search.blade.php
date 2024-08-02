@extends('front.layout.app')

@section('content')
    <!-- START HERO -->

    <!-- END HERO -->

    <!-- START SERVICES -->
    <section class="pb-4">
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="mt-0"><i class="mdi mdi-infinity"></i></h1>
                        <h3>Here you can check contact list</h3>
                        {{-- <p class="text-muted mt-2">The clean and well commented code allows easy customization of the
                            theme.It's designed for
                            <br>describing your app, agency or business.
                        </p> --}}
                    </div>
                </div>
            </div>
            <form action="">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="mb-2">
                            <select name="division" id="division" class="form-select">
                                <option value="">Select Division </option>
                                @foreach ($divisions as $division)
                                    <option {{ request()->division == $division->id ? 'selected' : '' }}
                                        value="{{ $division->id }}">{{ $division->name }} </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-2">
                            <select name="district" id="district" class="form-select">
                                <option value="">Select District </option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-2">
                            <select name="upazila" id="upazila" class="form-select">
                                <option value="">Select upazila </option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-2">
                            <select name="profession" id="profession" class="form-select">
                                <option value="">Select Profession </option>
                                @foreach ($professions as $profession)
                                    <option {{ request()->profession == $profession->id ? 'selected' : '' }}
                                        value="{{ $profession->id }}">{{ $profession->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mb-2">
                            <button class="btn btn-info">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            @if (isset($contacts) && !empty($contacts))
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->off_address }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ @$contacts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            @endif



        </div>
    </section>
    <!-- END SERVICES -->




    <!-- START CONTACT -->

    <!-- END CONTACT -->
@endsection
@push('script')
    <script>
        $(function() {
            var districtSelected = '{{ request()->district }}'
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

            var permanentSubDistrictSelected = '{{ request()->district }}';
            $('#district').on('change', function() {
                var district_id = $(this).val();
                $('#upazila').html('<option value="">Select upazila</option>');
                if (district_id != '' && district_id != null) {
                    $.ajax({
                        method: "GET",
                        url: '{{ route('get.sub_district') }}',
                        data: {
                            district_id: district_id
                        }
                    }).done(function(data) {
                        $.each(data, function(index, item) {
                            if (permanentSubDistrictSelected == item.id) {
                                $('#upazila').append('<option selected value="' +
                                    item
                                    .id +
                                    '" selected>' + item.name + '</option>');
                            } else {
                                $('#upazila').append('<option value="' + item.id +
                                    '">' +
                                    item.name + '</option>');
                            }
                        });
                        $('#upazila').trigger('change');
                    });
                }
            });
            $('#district').trigger('change');
        });
    </script>
@endpush
