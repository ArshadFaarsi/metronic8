@extends('admin.layouts.app')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Account Overview</h1>
                    </div>
                    <div>
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
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-body pt-9 pb-0">
                            <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                                <div class="me-7 mb-4">
                                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                        <img src="{{ asset($data->image) }}" alt="image" />
                                        <div
                                            class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center mb-2">
                                                <a href="#"
                                                    class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $data->name }}</a>
                                                <a href="#">
                                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                            height="24px" viewBox="0 0 24 24">
                                                            <path
                                                                d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                                fill="currentColor" />
                                                            <path
                                                                d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                                fill="white" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                                <a href="#"
                                                    class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">{{ $data->email }}</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-flex flex-wrap flex-stack">
                                        <div class="d-flex flex-column flex-grow-1 pe-8">
                                            <div class="d-flex flex-wrap">
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                    <div class="d-flex align-items-center">
                                                        <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="13" y="6"
                                                                    width="13" height="2" rx="1"
                                                                    transform="rotate(90 13 6)" fill="currentColor" />
                                                                <path
                                                                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <div class="fs-2 fw-bold" data-kt-countup="true"
                                                            data-kt-countup-value="4500" data-kt-countup-prefix="$">0
                                                        </div>
                                                    </div>
                                                    <div class="fw-semibold fs-6 text-gray-400">Earnings</div>
                                                </div>
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                    <div class="d-flex align-items-center">
                                                        <span class="svg-icon svg-icon-3 svg-icon-danger me-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="13" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)" fill="currentColor" />
                                                                <path
                                                                    d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <div class="fs-2 fw-bold" data-kt-countup="true"
                                                            data-kt-countup-value="75">0</div>
                                                    </div>
                                                    <div class="fw-semibold fs-6 text-gray-400">Projects</div>
                                                </div>
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                    <div class="d-flex align-items-center">
                                                        <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="13" y="6"
                                                                    width="13" height="2" rx="1"
                                                                    transform="rotate(90 13 6)" fill="currentColor" />
                                                                <path
                                                                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <div class="fs-2 fw-bold" data-kt-countup="true"
                                                            data-kt-countup-value="60" data-kt-countup-prefix="%">0</div>
                                                    </div>
                                                    <div class="fw-semibold fs-6 text-gray-400">Success Rate</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                            <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                                <span class="fw-semibold fs-6 text-gray-400">Profile Compleation</span>
                                                <span class="fw-bold fs-6">50%</span>
                                            </div>
                                            <div class="h-5px mx-3 w-100 bg-light mb-3">
                                                <div class="bg-success rounded h-5px" role="progressbar"
                                                    style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                <li class="nav-item mt-2">
                                    <a id="overview_btn"
                                        class="nav-link text-active-primary ms-0 me-10 py-5 active">Overview</a>
                                </li>
                                <li class="nav-item mt-2">
                                    <a id="setting_btn"
                                        class="nav-link text-active-primary ms-0 me-10 py-5">Settings</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                        <div class="card-header cursor-pointer">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Profile Details</h3>
                            </div>
                            <button id="edit_profile" class="btn btn-sm btn-primary align-self-center">Edit
                                Profile</button>
                        </div>
                        <div class="card-body p-9">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                                <div class="col-lg-8">
                                    <span
                                        class="fw-bold fs-6 text-gray-800">{{ Auth::guard('admin')->user()->name }}</span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Contact Phone
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Phone number must be active"></i></label>
                                <div class="col-lg-8 d-flex align-items-center">
                                    <span
                                        class="fw-bold fs-6 text-gray-800 me-2">{{ Auth::guard('admin')->user()->phone }}</span>
                                    <span class="badge badge-success">Verified</span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Email
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"></i></label>
                                <div class="col-lg-8 d-flex align-items-center">
                                    <span
                                        class="fw-bold fs-6 text-gray-800 me-2">{{ Auth::guard('admin')->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-5 mb-xl-10 d-none" id="kt_profile_details_update">
                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                            data-bs-target="#kt_account_profile_details" aria-expanded="true"
                            aria-controls="kt_account_profile_details">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Profile Details</h3>
                            </div>
                        </div>
                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <form action="{{ route('admin.profile.update') }}" method="POST"
                                id="kt_account_profile_details_form" class="form" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body border-top p-9">
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                                        <div class="col-lg-8">
                                            <div class="image-input image-input-outline" data-kt-image-input="true"
                                                style="background-image: url('public/assets/media/svg/avatars/blank.svg')">
                                                <div class="image-input-wrapper w-125px h-125px"
                                                    style="background-image: url(public/assets/media/avatars/300-1.jpg)">
                                                    <img class="w-125px h-125px" src="{{ asset($data->image) }}" alt="image" /></div>
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Change avatar">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="avatar_remove" />
                                                </label>
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    title="Cancel avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="Remove avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                            </div>
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span class="required">Full Name</span>
                                        </label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" name="name"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="Enter your name"
                                                value="{{ Auth::guard('admin')->user()->name }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span class="required">Contact Phone</span>
                                        </label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="tel" name="phone"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="Phone number"
                                                value="{{ Auth::guard('admin')->user()->phone }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="reset"
                                        class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                    <button type="submit" class="btn btn-primary"
                                        id="kt_account_profile_details_submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mb-5 mb-xl-10 d-none" id="kt_account_settings_signin_method_update">
                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                            data-bs-target="#kt_account_signin_method">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Sign-in Method</h3>
                            </div>
                        </div>
                        <div id="kt_account_settings_signin_method" class="collapse show">
                            <div class="card-body border-top p-9">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div id="kt_signin_email">
                                        <div class="fs-6 fw-bold mb-1">Email Address</div>
                                        <div class="fw-semibold text-gray-600">{{ Auth::guard('admin')->user()->email }}
                                        </div>
                                    </div>
                                    <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                        <form action="{{ route('admin.change.email') }}" method="POST"
                                            id="kt_signin_change_email" class="form" novalidate="novalidate">
                                            @csrf
                                            <div class="row mb-6">
                                                <div class="col-lg-6 mb-4 mb-lg-0">
                                                    <div class="fv-row mb-0">
                                                        <label for="emailaddress"
                                                            class="form-label fs-6 fw-bold mb-3">Enter New Email
                                                            Address</label>
                                                        <input type="email"
                                                            class="form-control form-control-lg form-control-solid"
                                                            id="emailaddress" placeholder="Email Address"
                                                            name="email" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="fv-row mb-0">
                                                        <label for="confirmemailpassword"
                                                            class="form-label fs-6 fw-bold mb-3">Confirm Password</label>
                                                        <input type="password"
                                                            class="form-control form-control-lg form-control-solid"
                                                            name="password" id="confirmemailpassword" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <button id="kt_signin_submita" type="submit"
                                                    class="btn btn-primary me-2 px-6">Update Email</button>
                                                <button id="kt_signin_cancel" type="button"
                                                    class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="kt_signin_email_button" class="ms-auto">
                                        <button class="btn btn-light btn-active-light-primary">Change Email</button>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-6"></div>
                                <div class="d-flex flex-wrap align-items-center mb-10">
                                    <div id="kt_signin_password">
                                        <div class="fs-6 fw-bold mb-1">Password</div>
                                        <div class="fw-semibold text-gray-600">************</div>
                                    </div>
                                    <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                        <form action="{{ route('admin.change.password') }}" method="POST"
                                            id="kt_signin_change_password" class="form" novalidate="novalidate">
                                            @csrf
                                            <div class="row mb-1">
                                                <div class="col-lg-4">
                                                    <div class="fv-row mb-0">
                                                        <label for="currentpassword"
                                                            class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                                        <input type="password"
                                                            class="form-control form-control-lg form-control-solid"
                                                            name="currentpassword" id="currentpassword" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="fv-row mb-0">
                                                        <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New
                                                            Password</label>
                                                        <input type="password"
                                                            class="form-control form-control-lg form-control-solid"
                                                            name="newpassword" id="newpassword" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="fv-row mb-0">
                                                        <label for="confirmpassword"
                                                            class="form-label fs-6 fw-bold mb-3">Confirm New
                                                            Password</label>
                                                        <input type="password"
                                                            class="form-control form-control-lg form-control-solid"
                                                            name="confirmpassword" id="confirmpassword" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-text mb-5">Password must be at least 8 character and contain
                                                symbols</div>
                                            <div class="d-flex">
                                                <button id="kt_password_submitk" type="submit"
                                                    class="btn btn-primary me-2 px-6">Update Password</button>
                                                <button id="kt_password_cancel" type="button"
                                                    class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="kt_signin_password_button" class="ms-auto">
                                        <button class="btn btn-light btn-active-light-primary">Change Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer-js')
    <script src="{{ asset('public/assets') }}/js/custom/apps/customers/list/list.js"></script>
@endpush
