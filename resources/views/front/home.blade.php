@extends('front.layout.app')

@section('content')
    <!-- START HERO -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="mt-md-4">
                        <div>
                            <span class="badge bg-danger rounded-pill">New</span>
                            <span class="text-white-50 ms-1">Welcome to new landing page</span>
                        </div>
                        <h2 class="text-white fw-normal mb-4 mt-3 hero-title">
                            Responsive Web UI Kit & Dashboard Template
                        </h2>

                        <p class="mb-4 font-16 text-white-50">Hyper is a fully featured dashboard and admin template
                            comes with tones of well designed UI elements, components, widgets and pages.</p>

                        <a href="" target="_blank" class="btn btn-success">Preview <i
                                class="mdi mdi-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-5 offset-md-2">
                    <div class="text-md-end mt-3 mt-md-0">
                        <img src="assets/images/startup.svg" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END HERO -->

    <!-- START SERVICES -->
    <section class="py-5">
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
                            <input class="form-control form-control-light" type="text" id="name" name="name"
                                placeholder="Name...">
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
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->phone }}</td>
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
    <section class="py-5 bg-light-lighten border-top border-bottom border-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h3>Get In <span class="text-primary">Touch</span></h3>
                        <p class="text-muted mt-2">Please fill out the following form and we will get back to you
                            shortly. For more
                            <br>information please contact us.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="col-md-4">
                    <p class="text-muted"><span class="fw-bold">Customer Support:</span><br> <span class="d-block mt-1">+1
                            234 56 7894</span></p>
                    <p class="text-muted mt-4"><span class="fw-bold">Email Address:</span><br> <span
                            class="d-block mt-1">info@gmail.com</span></p>
                    <p class="text-muted mt-4"><span class="fw-bold">Office Address:</span><br> <span
                            class="d-block mt-1">4461 Cedar Street Moro, AR 72368</span></p>
                    <p class="text-muted mt-4"><span class="fw-bold">Office Time:</span><br> <span
                            class="d-block mt-1">9:00AM To 6:00PM</span></p>
                </div>

                <div class="col-md-8">
                    <form>
                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="fullname" class="form-label">Your Name</label>
                                    <input class="form-control form-control-light" type="text" id="fullname"
                                        placeholder="Name...">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="emailaddress" class="form-label">Your Email</label>
                                    <input class="form-control form-control-light" type="email" required=""
                                        id="emailaddress" placeholder="Enter you email...">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="subject" class="form-label">Your Subject</label>
                                    <input class="form-control form-control-light" type="text" id="subject"
                                        placeholder="Enter subject...">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="comments" class="form-label">Message</label>
                                    <textarea id="comments" rows="4" class="form-control form-control-light"
                                        placeholder="Type your message here..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 text-end">
                                <button class="btn btn-primary">Send a Message <i class="mdi mdi-telegram ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
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
        });
    </script>
@endpush
