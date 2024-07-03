@extends('front.layout.app')

@section('content')
    <!-- START HERO -->

    <!-- START CONTACT -->
    <section class="py-5 bg-light-lighten border-top border-bottom border-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h3>Your Profile</span></h3>
                        <p class="text-muted mt-2">Please fill out the following form and update your profile.
                        </p>
                    </div>
                </div>
            </div>
            <form>
                <div class="row  mt-3">
                    <div class="col-md-4">
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="fullname" class="form-label">Your Name</label>
                                    <input class="form-control form-control-light" type="text" id="fullname"
                                        name="name" placeholder="Name..." value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="father_name" class="form-label">Your Father Name</label>
                                    <input class="form-control form-control-light" type="text" id="father_name"
                                        name="father_name" placeholder="Father Name..."
                                        value="{{ old('father_name', $user->father_name) }}">
                                    @error('father_name')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="emailaddress" class="form-label">Your Email</label>
                                    <input class="form-control form-control-light" type="email" required=""
                                        name="email" id="emailaddress" placeholder="Enter you email..."
                                        value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="phone" class="form-label">Your Phone</label>
                                    <input class="form-control form-control-light" type="number" required=""
                                        name="phone" id="phone" placeholder="Enter you phone..."
                                        value="{{ old('phone', $user->phone) }}">
                                    @error('phone')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                                    <input class="form-control form-control-light" type="date" required=""
                                        name="date_of_birth" id="date_of_birth" placeholder="Enter you phone..."
                                        value="{{ old('date_of_birth', $user->date_of_birth) }}">
                                    @error('date_of_birth')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="nid" class="form-label">Your NID</label>
                                    <input class="form-control form-control-light" type="number" required=""
                                        name="nid" id="nid" placeholder="Enter you nid..."
                                        value="{{ old('nid', $user->nid) }}">
                                    @error('nid')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <h4>Present Address</h4>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="present_division" class="form-label">Division</label>
                                    <select name="present_division" class="form-select form-control-light"
                                        id="present_divission">
                                        <option value="">Select One</option>
                                        @foreach ($divisions as $division)
                                            <option {{ old('present_divission', $user->divission_id) }}
                                                value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('present_divission')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="father_name" class="form-label">Your Father Name</label>
                                    <input class="form-control form-control-light" type="text" id="father_name"
                                        name="father_name" placeholder="Father Name..."
                                        value="{{ old('father_name', $user->father_name) }}">
                                    @error('father_name')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mt-3">
                    <div class="col-md-12">
                        <div class="row mt-2">
                            <div class="col-12 text-end">
                                <button class="btn btn-primary">Update profile <i class="mdi mdi-telegram ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- END CONTACT -->
@endsection
