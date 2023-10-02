<div class="modal fade" id="view_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-1000px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_customer_header">
                <h2 class="fw-bold">View Profile</h2>
                <div id="view_user_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <span class="svg-icon svg-icon-1" data-bs-toggle="modal" data-bs-target="#view_user">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body py-10 px-lg-17" style="position: relative;">
                <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                    data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                    data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="100px">
                    {{-- starts content --}}
                    <div class="bootbox-body">
                        <div id="user-profile-model-content">
                            <div id="content-container" style="padding-top:0px !important;">
                                <div class="text-center pad-all">
                                    <div class="pad-ver">
                                        <img src="https://www.easyloade.com/uploads/user_image/default.jpg"
                                            class=" img-thumbnail h-100px" style="border-radius:50%"
                                            alt="Profile Picture">
                                    </div>
                                   
                                    <h4 class="text-lg text-overflow mar-no" id="_pr-usr-fname"></h4>
                                    <div class="pad-ver btn-group">
                                        <a href="" class="fa fa-2x fa-envelope" id="_pr-usr-env-email"></a>
                                    </div>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel-body">
                                            <table class="table table-striped text-center" style="border-radius:3px;">
                                                <tbody>
                                                    <tr>
                                                        <th class="custom_td">Name</th>
                                                        <td class="custom_td" id="_pr-usr-name">Kayla Stander</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="custom_td">Email</th>
                                                        <td class="custom_td" id="_pr-usr-email">kaylasstander@gmail.com
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="custom_td">Country</th>
                                                        <td class="custom_td" id="_pr-usr-country">
                                                            South Africa </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="custom_td">Verified</th>
                                                        <td class="custom_td" id="_pr-usr-verified">08 Mar 2023 12:58:27
                                                            PM</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="custom_td">Joining Date</th>
                                                        <td class="custom_td" id="_pr-usr-join-at">08 Mar 2023 12:58:27
                                                            PM</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- starts content end --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script></script>
