@extends('admin.auth.layout.app')
@section('content')
    <!--begin::Body-->
    <div class="d-flex flex-center w-lg-50 p-10">
        <!--begin::Card-->
        <div class="card rounded-3 w-md-550px">
            <!--begin::Card body-->
            <div class="card-body d-flex flex-column p-10 p-lg-20 pb-lg-10">
                <!--begin::Wrapper-->
                <div class="d-flex flex-center flex-column-fluid pb-15 pb-lg-20">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" method="POST" id="kt_password_reset_form"
                        data-kt-redirect-url="../../demo1/dist/authentication/layouts/creative/new-password.html"
                        action="{{ url('admin/reset-password-link') }}">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">Forgot Password ?</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-500 fw-semibold fs-6">Enter your email to reset your password.</div>
                            <!--end::Link-->
                        </div>
                        <div class="text-center mb-10">
                            @if (session()->has('success'))
                                <div class="me-auto text-success align-self-md-end">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="me-auto text-danger align-self-md-end">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="text" placeholder="Email" name="email" autocomplete="off"
                                class="form-control bg-transparent" />
                            <!--end::Email-->
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                            <button type="submit" id="kt_password_reset_submit" class="btn btn-primary me-4">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Submit</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                            <a href="{{route('login') }}" class="btn btn-light">Cancel</a>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Body-->
@endsection
@push('js')
@endpush
