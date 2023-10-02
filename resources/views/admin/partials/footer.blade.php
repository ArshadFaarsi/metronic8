<!--begin::Javascript-->
<script>
    var hostUrl = "{{ asset('public/') }}";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('public/assets') }}/plugins/global/plugins.bundle.js"></script>
<script src="{{ asset('public/assets') }}/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('public/assets') }}/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="{{ asset('public/assets') }}/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>

<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('public/assets') }}/js/widgets.bundle.js"></script>
<script src="{{ asset('public/assets') }}/js/custom/widgets.js"></script>
<script src="{{ asset('public/assets') }}/js/custom/apps/chat/chat.js"></script>
<script src="{{ asset('public/assets') }}/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="{{ asset('public/assets') }}/js/custom/utilities/modals/create-app.js"></script>
<script src="{{ asset('public/assets') }}/js/custom/utilities/modals/users-search.js"></script>
<script src="{{ asset('public/assets') }}/js/custom/account/settings/signin-methods.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/dt-1.11.3/datatables.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js">
</script>
    <script src="{{ asset('public/assets') }}/js/select2.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            responsive: true,
            searching: true,
            paging: true,
            ordering: true,
            scrollX: true,
            scrollY: false,
        });
    });

    /* ck editor script*/
    ClassicEditor.create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@stack('footer-js');
<!--end::custom js-->
