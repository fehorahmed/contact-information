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
                                    <label for="present_district" class="form-label">District</label>
                                    <select name="present_district" class="form-select form-control-light"
                                        id="present_district">
                                        <option value="">Select One</option>

                                    </select>
                                    @error('present_district')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="present_upazila" class="form-label">Upazila</label>
                                    <select name="present_upazila" class="form-select form-control-light"
                                        id="present_upazila">
                                        <option value="">Select One</option>

                                    </select>
                                    @error('present_upazila')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="present_union" class="form-label">Union</label>
                                    <select name="present_union" class="form-select form-control-light"
                                        id="present_union">
                                        <option value="">Select One</option>

                                    </select>
                                    @error('present_union')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="present_ward" class="form-label">Word No</label>
                                    <select name="present_ward" class="form-select form-control-light" id="present_ward">
                                        <option value="">Select One</option>
                                        <option {{ old('present_ward') == 1 ? 'selected' : '' }} value="1">1
                                        </option>
                                        <option {{ old('present_ward') == 2 ? 'selected' : '' }} value="2">2
                                        </option>
                                        <option {{ old('present_ward') == 3 ? 'selected' : '' }} value="3">3
                                        </option>
                                        <option {{ old('present_ward') == 4 ? 'selected' : '' }} value="4">4
                                        </option>
                                        <option {{ old('present_ward') == 5 ? 'selected' : '' }} value="5">5
                                        </option>
                                        <option {{ old('present_ward') == 6 ? 'selected' : '' }} value="6">6
                                        </option>
                                        <option {{ old('present_ward') == 7 ? 'selected' : '' }} value="7">7
                                        </option>
                                        <option {{ old('present_ward') == 8 ? 'selected' : '' }} value="8">8
                                        </option>
                                        <option {{ old('present_ward') == 9 ? 'selected' : '' }} value="9">9
                                        </option>
                                        <option {{ old('present_ward') == 10 ? 'selected' : '' }} value="10">10
                                        </option>
                                        <option {{ old('present_ward') == 11 ? 'selected' : '' }} value="11">11
                                        </option>
                                        <option {{ old('present_ward') == 12 ? 'selected' : '' }} value="12">12
                                        </option>

                                    </select>
                                    @error('present_ward')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="present_address" class="form-label">Your Address</label>
                                    <textarea class="form-control" name="present_address" id="present_address" cols="30" rows="2">{{ old('present_address') }}</textarea>
                                    @error('present_address')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <h4>Permanent Address</h4>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="permanent_division" class="form-label">Division</label>
                                    <select name="permanent_division" class="form-select form-control-light"
                                        id="permanent_division">
                                        <option value="">Select One</option>
                                        @foreach ($divisions as $division)
                                            <option {{ old('permanent_division', $user->per_divission_id) }}
                                                value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('permanent_division')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="permanent_district" class="form-label">District</label>
                                    <select name="permanent_district" class="form-select form-control-light"
                                        id="permanent_district">
                                        <option value="">Select One</option>

                                    </select>
                                    @error('permanent_district')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="permanent_upazila" class="form-label">Upazila</label>
                                    <select name="permanent_upazila" class="form-select form-control-light"
                                        id="permanent_upazila">
                                        <option value="">Select One</option>

                                    </select>
                                    @error('permanent_upazila')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="permanent_union" class="form-label">Union</label>
                                    <select name="permanent_union" class="form-select form-control-light"
                                        id="permanent_union">
                                        <option value="">Select One</option>

                                    </select>
                                    @error('present_union')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="permanent_ward" class="form-label">Word No</label>
                                    <select name="permanent_ward" class="form-select form-control-light"
                                        id="permanent_ward">
                                        <option value="">Select One</option>
                                        <option {{ old('permanent_ward') == 1 ? 'selected' : '' }} value="1">1
                                        </option>
                                        <option {{ old('permanent_ward') == 2 ? 'selected' : '' }} value="2">2
                                        </option>
                                        <option {{ old('permanent_ward') == 3 ? 'selected' : '' }} value="3">3
                                        </option>
                                        <option {{ old('permanent_ward') == 4 ? 'selected' : '' }} value="4">4
                                        </option>
                                        <option {{ old('permanent_ward') == 5 ? 'selected' : '' }} value="5">5
                                        </option>
                                        <option {{ old('permanent_ward') == 6 ? 'selected' : '' }} value="6">6
                                        </option>
                                        <option {{ old('permanent_ward') == 7 ? 'selected' : '' }} value="7">7
                                        </option>
                                        <option {{ old('permanent_ward') == 8 ? 'selected' : '' }} value="8">8
                                        </option>
                                        <option {{ old('permanent_ward') == 9 ? 'selected' : '' }} value="9">9
                                        </option>
                                        <option {{ old('permanent_ward') == 10 ? 'selected' : '' }} value="10">10
                                        </option>
                                        <option {{ old('permanent_ward') == 11 ? 'selected' : '' }} value="11">11
                                        </option>
                                        <option {{ old('permanent_ward') == 12 ? 'selected' : '' }} value="12">12
                                        </option>

                                    </select>
                                    @error('permanent_ward')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="permanent_address" class="form-label">Your Address</label>
                                    <textarea class="form-control" name="permanent_address" id="permanent_address" cols="30" rows="2">{{ old('present_address') }}</textarea>
                                    @error('permanent_address')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mt-3">

                    <div class="col-md-4">
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <h4>Office Information</h4>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="profession" class="form-label">Profession</label>
                                    <select name="profession" class="form-select form-control-light" id="profession">
                                        <option value="">Select One</option>
                                        @foreach ($professions as $profession)
                                            <option {{ old('profession', $user->profession_id) }}
                                                value="{{ $profession->id }}">{{ $profession->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('present_divission')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="designation" class="form-label">Your designation</label>
                                    <input class="form-control form-control-light" type="text" required=""
                                        name="designation" id="designation" placeholder="Enter you designation..."
                                        value="{{ old('designation', $user->designation) }}">
                                    @error('designation')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="office_phone" class="form-label">Your Office Phone</label>
                                    <input class="form-control form-control-light" type="text" required=""
                                        name="office_phone" id="office_phone" placeholder="Enter you office phone..."
                                        value="{{ old('office_phone', $user->off_phone) }}">
                                    @error('office_phone')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row mt-2">

                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="office_division" class="form-label">Division</label>
                                    <select name="office_division" class="form-select form-control-light"
                                        id="office_division">
                                        <option value="">Select One</option>
                                        @foreach ($divisions as $division)
                                            <option {{ old('office_division', $user->off_division_id) }}
                                                value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('office_division')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="office_district" class="form-label">District</label>
                                    <select name="office_district" class="form-select form-control-light"
                                        id="office_district">
                                        <option value="">Select One</option>

                                    </select>
                                    @error('office_district')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <div class="mb-2">
                                    <label for="permanent_address" class="form-label">Office Address</label>
                                    <textarea class="form-control" name="permanent_address" id="permanent_address" cols="30" rows="5">{{ old('present_address') }}</textarea>
                                    @error('permanent_address')
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
