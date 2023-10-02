@extends('admin.layouts.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Manage
                        Users</h1>
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
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-sm fw-bold btn-primary">Add User</a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
                    <div class="card-body pt-0">
                        <table class="table table-striped table-bordered text-center fs-6 gy-5" id="myTable">

                            <thead>
                                <tr class="text-gray-400-center fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-50px">Sr #</th>
                                    <th class="min-w-125px">Name</th>
                                    <th class="min-w-125px">Email</th>
                                    <th class="min-w-125px">Image</th>
                                    <th class="min-w-125px">Approve/block</th>
                                    <th class="min-w-70px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            <img src="{{asset($user->image)}}" alt="" height="50px" width="50px">
                                        </td>
                                        <?php
                                        $class = 'badge badge-danger';
                                        $text = 'In active';
                                        if ($user->is_active == 1) {
                                            $class = 'badge badge-success';
                                            $text = 'Active';
                                        }
                                        ?>
                                        <td>
                                            <div class="d-flex align-items-center gap-5 ">
                                                <div>
                                                    <span style="width: fit-content;"
                                                        id="user-status-value-{{ $user->id }}"
                                                        class="{{ $class }}">
                                                        {{ $text }}
                                                    </span>
                                                </div>
                                                <div class="form-switch form-switch-sm form-check-custom form-check-solid">
                                                    <input onchange="userStatusChange('{{ $user->id }}')"
                                                        type="checkbox" class="form-check-input" name="is_active"
                                                        value="{{ $user->is_active }}"
                                                        @if ($user->is_active == 1) checked @endif
                                                        id="user-status-{{ $user->id }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center d-flex">
                                            <!--begin::user modal button-->
                                            <button type="button" class="btn btn-sm btn-primary mx-1"
                                                onclick="getUserProfile('{{ $user->id }}')" data-bs-toggle="modal"
                                                data-bs-target="#view_user">view</button>

                                            <!--end::user modal button-->
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.users.model')
@endsection
@push('footer-js')
    <script src="{{ asset('public/assets') }}/js/ajax-calls.js?v=1"></script>
    <script src="{{ asset('public/assets') }}/js/custom/apps/customers/list/list.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTables').DataTable({
                responsive: true,
                searching: false,
                paging: false,
                ordering: false,
                scrollX: true,
                scrollY: false,
            });
        });
    </script>
@endpush
