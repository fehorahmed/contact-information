{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

@extends('front.layout.app')

@section('content')
    <!-- START HERO -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h3 class="text-light">Registration Form</h3>

                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="col-md-8 text-light">
                    <form action="{{ route('user.registration') }}" method="POST">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="fullname" class="form-label">Your Name</label>
                                    <input class="form-control form-control-light" type="text" id="fullname"
                                        name="name" placeholder="Name..." value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="father_name" class="form-label">Your Father Name</label>
                                    <input class="form-control form-control-light" type="text" id="father_name"
                                        name="father_name" placeholder="Father Name..." value="{{ old('father_name') }}">
                                    @error('father_name')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="emailaddress" class="form-label">Your Email</label>
                                    <input class="form-control form-control-light" type="email" required=""
                                        name="email" id="emailaddress" placeholder="Enter you email..."
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="phone" class="form-label">Your Phone</label>
                                    <input class="form-control form-control-light" type="number" required=""
                                        name="phone" id="phone" placeholder="Enter you phone..."
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="password" class="form-label">Your Password</label>
                                    <input class="form-control form-control-light" type="password" required=""
                                        name="password" id="password" placeholder="Enter you password...">
                                    @error('password')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input class="form-control form-control-light" type="password" required=""
                                        name="password_confirmation" id="password_confirmation"
                                        placeholder="Enter Confirm Password...">
                                    @error('password_confirmation')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2 position-relative" id="datepicker2">
                                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                                    <input class="form-control form-control-light" type="text" required=""
                                        name="date_of_birth" data-provide="datepicker" data-date-format="dd-mm-yyyy"
                                        data-date-container="#datepicker2" value="{{ old('date_of_birth') }}">
                                    @error('date_of_birth')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="nid" class="form-label">Your NID</label>
                                    <input class="form-control form-control-light" type="number" required=""
                                        name="nid" id="nid" placeholder="Enter you nid..."
                                        value="{{ old('nid') }}">
                                    @error('nid')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 text-center">
                                <button class="btn btn-info">Submit Registration<i class="mdi mdi-telegram ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END HERO -->
@endsection
