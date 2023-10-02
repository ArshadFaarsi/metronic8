@extends('admin.layouts.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Terms & Conditions</h1>
                </div>
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
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">#</th>
                                    <th class="min-w-125px">Desription</th>
                                    <th class="text-center min-w-70px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        {{ $data->description }}
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-primary mx-1" href="{{ route('admin.terms.edit', $data->id) }}"
                                            class="menu-link px-3">Edit</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer-js')
    <script src="{{ asset('assets') }}/js/custom/apps/customers/list/list.js"></script>
@endpush
