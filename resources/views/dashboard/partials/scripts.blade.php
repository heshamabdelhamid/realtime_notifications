@stack('scripts')

<script src="{{ asset('assets') }}/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery.min.js"></script>
<script src="{{ asset('assets') }}/js/popper.min.js"></script>
<script src="{{ asset('assets') }}/js/moment.min.js"></script>
<script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('assets') }}/js/simplebar.min.js"></script>
<script src='{{ asset('assets') }}/js/daterangepicker.js'></script>
<script src='{{ asset('assets') }}/js/jquery.stickOnScroll.js'></script>
<script src="{{ asset('assets') }}/js/tinycolor-min.js"></script>
<script src="{{ asset('assets') }}/js/config.js"></script>
<script src="{{ asset('assets') }}/js/d3.min.js"></script>
<script src="{{ asset('assets') }}/js/topojson.min.js"></script>
<script src="{{ asset('assets') }}/js/datamaps.all.min.js"></script>
<script src="{{ asset('assets') }}/js/datamaps-zoomto.js"></script>
<script src="{{ asset('assets') }}/js/datamaps.custom.js"></script>
<script src="{{ asset('assets') }}/js/Chart.min.js"></script>
<script src="{{ asset('assets') }}/js/gauge.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery.sparkline.min.js"></script>
<script src="{{ asset('assets') }}/js/apexcharts.min.js"></script>
<script src="{{ asset('assets') }}/js/apexcharts.custom.js"></script>
<script src='{{ asset('assets') }}/js/jquery.mask.min.js'></script>
<script src='{{ asset('assets') }}/js/select2.min.js'></script>
<script src='{{ asset('assets') }}/js/jquery.steps.min.js'></script>
<script src='{{ asset('assets') }}/js/jquery.validate.min.js'></script>
<script src='{{ asset('assets') }}/js/jquery.timepicker.js'></script>
<script src='{{ asset('assets') }}/js/dropzone.min.js'></script>
<script src='{{ asset('assets') }}/js/uppy.min.js'></script>
<script src='{{ asset('assets') }}/js/quill.min.js'></script>

<script>
    $(document).ready(function() {
        $('.notificationsIcon').on('click', function() {
            // alert('Hello');
            $.ajax({
                method: "get",
                url: {{ Illuminate\Support\Js::from(route('admin.notifications.MarkAsRead')) }},

                success: function(response) {
                    $("#notification-counter").load("#notification-counter > *");
                    $("#notification-modal").load("#notification-modal > *");
                    // $("#notification-color").load("#notification-color > *");
                }

            });
        });
    });
</script>
