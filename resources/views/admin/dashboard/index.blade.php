@php
    const liteColors = ['#0073b7', '#f39c12', '#0F86a0', '#0F86f0', '#007397', '#FF6666', '#FFB266', '#f39c12', '#00a65a', '#00a65f'];
@endphp
@extends('admin.layouts.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        @include('admin.dashboard.includes.toolbar')
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row gy-5 g-xl-10">
                    @foreach ($page_data as $title => $value)
                        <div class="col-sm-6 col-xl-3 mb-xl-10">
                            <div class="card h-lg-100" style="background-color:{{ liteColors[rand(0, 9)] }}">
                                <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                    <div class="d-flex flex-column my-7">
                                        <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $value ?? 0 }}</span>
                                        <div class="m-0">
                                            <span
                                                class="fw-semibold fs-6 text-gray-100">{{ ucwords(str_replace('_', ' ', $title)) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
