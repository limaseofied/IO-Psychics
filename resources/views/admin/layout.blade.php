<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Dashboard')</title>

    <meta name="description" content="Dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon"> --}}

    <!-- Basic Styles -->
    
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/weather-icons.min.css') }}" rel="stylesheet" />
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!-- Beyond styles -->
    <link id="beyond-link" href="{{ asset('assets/css/beyond.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/typicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />   
     <link href="{{ asset('assets/css/dataTables.bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

    <!-- Skin Script -->
    <script src="{{ asset('assets/js/skins.min.js') }}"></script>

    

    @stack('styles')
   
     @include('admin.header')  <!-- your header -->

</head>

<body>
   
    <!-- Main Content -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
             @include('admin.sidebar')  <!-- sidebar goes here -->    

              @yield('content')
        </div>
    </div>

    <!-- Include your footer -->
    @include('admin.footer')

    <!-- Scripts -->
    <!--Basic Scripts-->
<script src="{{ asset('assets/js/jquery-2.0.3.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!--Beyond Scripts-->
<script src="{{ asset('assets/js/beyond.min.js') }}"></script>


<!--Page Related Scripts-->
<!--Sparkline Charts Needed Scripts-->
<script src="{{ asset('assets/js/charts/sparkline/jquery.sparkline.js') }}"></script>
<script src="{{ asset('assets/js/charts/sparkline/sparkline-init.js') }}"></script>

<!--Easy Pie Charts Needed Scripts-->
<script src="{{ asset('assets/js/charts/easypiechart/jquery.easypiechart.js') }}"></script>
<script src="{{ asset('assets/js/charts/easypiechart/easypiechart-init.js') }}"></script>

<!--Flot Charts Needed Scripts-->
<script src="{{ asset('assets/js/charts/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/js/charts/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/js/charts/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/js/charts/flot/jquery.flot.tooltip.js') }}"></script>
<script src="{{ asset('assets/js/charts/flot/jquery.flot.orderBars.js') }}"></script>

<script src="{{ asset('assets/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/ZeroClipboard.js') }}"></script>
<script src="{{ asset('assets/js/datatable/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables-init.js') }}"></script>

<script src="{{ asset('assets/js/fuelux/wizard/wizard-custom.js') }}"></script>
<script src="{{ asset('assets/js/toastr/toastr.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <script type="text/javascript">
        jQuery(function ($) {
            $('#simplewizardinwidget').wizard();
            $('#simplewizard').wizard();
            $('#tabbedwizard').wizard().on('finished', function (e) {
                Notify('Thank You! All of your information saved successfully.', 'bottom-right', '5000', 'blue', 'fa-check', true);
            });
            $('#WiredWizard').wizard();
        });
    </script>

   <script>
      $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
    var $el = $("#placeholder");

    $el.css({ width: '100%', height: '300px' }); // ensure size

    $.plot($el, data, options);
});


$(document).ready(function() {
    $('#DataTable').DataTable({
        "paging": true,
        "ordering": true,
        "info": true,
        "searching": true,
        "language": {
            "emptyTable": "No Records available." // shown when table is empty
        }
    });
});


</script>


    <!--Google Analytics::Demo Only-->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'http://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-52103994-1', 'auto');
        ga('send', 'pageview');

    
    document.addEventListener("DOMContentLoaded", function () {

    const maxChars = 3000;
    const $charCount = $('#charCount');

    $('.editor').summernote({
    height: 200,
    toolbar: [
        ['style', ['bold', 'italic', 'underline']],
        ['para', ['ul', 'ol']],
        ['insert', ['link']],
        ['view', ['codeview']]
    ],
    callbacks: {
        onInit: function() {
            let text = $(this).summernote('code').replace(/<[^>]*>/g, '');
            $charCount.text(text.length);
        },
        onKeyup: function() {
            let text = $(this).summernote('code').replace(/<[^>]*>/g, '');
            let length = text.length;

            if (length > maxChars) {
                alert('Max 2000 characters allowed');
                $(this).summernote('code', text.substring(0, maxChars));
                length = maxChars;
            }

            $charCount.text(length);
        }
    }
});


            const AUTO_LOGOUT_TIME = 15 * 60 * 1000; // 15 minutes
            let logoutTimer;

            function resetTimer() {
                clearTimeout(logoutTimer);
                logoutTimer = setTimeout(autoLogout, AUTO_LOGOUT_TIME);
            }

            function autoLogout() {
                fetch("{{ route('admin.logout') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json",
                    },
                }).then(() => {
                    window.location.href = "{{ route('admin.login') }}";
                }).catch(err => console.error("Logout error:", err));
            }

            ['click', 'mousemove', 'keypress', 'scroll', 'touchstart'].forEach(event => {
                document.addEventListener(event, resetTimer);
            });

            resetTimer(); // start timer on page load
        });
    </script>

     <script>
        // If you want to draw your charts with Theme colors you must run initiating charts after that current skin is loaded
        $(window).bind("load", function () {

            /*Sets Themed Colors Based on Themes*/
            themeprimary = getThemeColorFromCss('themeprimary');
            themesecondary = getThemeColorFromCss('themesecondary');
            themethirdcolor = getThemeColorFromCss('themethirdcolor');
            themefourthcolor = getThemeColorFromCss('themefourthcolor');
            themefifthcolor = getThemeColorFromCss('themefifthcolor');

            //Sets The Hidden Chart Width
            $('#dashboard-bandwidth-chart')
                .data('width', $('.box-tabbs')
                    .width() - 20);

            //-------------------------Visitor Sources Pie Chart----------------------------------------//
            var data = [
                {
                    data: [[1, 21]],
                    color: '#fb6e52'
                },
                {
                    data: [[1, 12]],
                    color: '#e75b8d'
                },
                {
                    data: [[1, 11]],
                    color: '#a0d468'
                },
                {
                    data: [[1, 10]],
                    color: '#ffce55'
                },
                {
                    data: [[1, 46]],
                    color: '#5db2ff'
                }
            ];
            var placeholder = $("#dashboard-pie-chart-sources");
            placeholder.unbind();

            $.plot(placeholder, data, {
                series: {
                    pie: {
                        innerRadius: 0.45,
                        show: true,
                        stroke: {
                            width: 4
                        }
                    }
                }
            });

            //------------------------------Visit Chart------------------------------------------------//
            var data2 = [{
                color: themesecondary,
                label: "Direct Visits",
                data: [[3, 2], [4, 5], [5, 4], [6, 11], [7, 12], [8, 11], [9, 8], [10, 14], [11, 12], [12, 16], [13, 9],
                [14, 10], [15, 14], [16, 15], [17, 9]],

                lines: {
                    show: true,
                    fill: true,
                    lineWidth: .1,
                    fillColor: {
                        colors: [{
                            opacity: 0
                        }, {
                            opacity: 0.4
                        }]
                    }
                },
                points: {
                    show: false
                },
                shadowSize: 0
            },
                {
                    color: themeprimary,
                    label: "Referral Visits",
                    data: [[3, 10], [4, 13], [5, 12], [6, 16], [7, 19], [8, 19], [9, 24], [10, 19], [11, 18], [12, 21], [13, 17],
                    [14, 14], [15, 12], [16, 14], [17, 15]],
                    bars: {
                        order: 1,
                        show: true,
                        borderWidth: 0,
                        barWidth: 0.4,
                        lineWidth: .5,
                        fillColor: {
                            colors: [{
                                opacity: 0.4
                            }, {
                                opacity: 1
                            }]
                        }
                    }
                },
                {
                    color: themethirdcolor,
                    label: "Search Engines",
                    data: [[3, 14], [4, 11], [5, 10], [6, 9], [7, 5], [8, 8], [9, 5], [10, 6], [11, 4], [12, 7], [13, 4],
                    [14, 3], [15, 4], [16, 6], [17, 4]],
                    lines: {
                        show: true,
                        fill: false,
                        fillColor: {
                            colors: [{
                                opacity: 0.3
                            }, {
                                opacity: 0
                            }]
                        }
                    },
                    points: {
                        show: true
                    }
                }
            ];
            var options = {
                legend: {
                    show: false
                },
                xaxis: {
                    tickDecimals: 0,
                    color: '#f3f3f3'
                },
                yaxis: {
                    min: 0,
                    color: '#f3f3f3',
                    tickFormatter: function (val, axis) {
                        return "";
                    },
                },
                grid: {
                    hoverable: true,
                    clickable: false,
                    borderWidth: 0,
                    aboveData: false,
                    color: '#fbfbfb'

                },
                tooltip: true,
                tooltipOpts: {
                    defaultTheme: false,
                    content: " <b>%x May</b> , <b>%s</b> : <span>%y</span>",
                }
            };
            var placeholder = $("#dashboard-chart-visits");
            var plot = $.plot(placeholder, data2, options);

            //------------------------------Real-Time Chart-------------------------------------------//
            var data = [],
                totalPoints = 300;

            function getRandomData() {

                if (data.length > 0)
                    data = data.slice(1);

                // Do a random walk

                while (data.length < totalPoints) {

                    var prev = data.length > 0 ? data[data.length - 1] : 50,
                        y = prev + Math.random() * 10 - 5;

                    if (y < 0) {
                        y = 0;
                    } else if (y > 100) {
                        y = 100;
                    }

                    data.push(y);
                }

                // Zip the generated y values with the x values

                var res = [];
                for (var i = 0; i < data.length; ++i) {
                    res.push([i, data[i]]);
                }

                return res;
            }
            // Set up the control widget
            var updateInterval = 100;
            var plot = $.plot("#dashboard-chart-realtime", [getRandomData()], {
                yaxis: {
                    color: '#f3f3f3',
                    min: 0,
                    max: 100,
                    tickFormatter: function (val, axis) {
                        return "";
                    }
                },
                xaxis: {
                    color: '#f3f3f3',
                    min: 0,
                    max: 100,
                    tickFormatter: function (val, axis) {
                        return "";
                    }
                },
                colors: [themeprimary],
                series: {
                    lines: {
                        lineWidth: 0,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.5
                            }, {
                                opacity: 0
                            }]
                        },
                        steps: false
                    },
                    shadowSize: 0
                },
                grid: {
                    hoverable: true,
                    clickable: false,
                    borderWidth: 0,
                    aboveData: false
                }
            });

            function update() {

                plot.setData([getRandomData()]);

                plot.draw();
                setTimeout(update, updateInterval);
            }
            update();


            //-------------------------Initiates Easy Pie Chart instances in page--------------------//
            InitiateEasyPieChart.init();

            //-------------------------Initiates Sparkline Chart instances in page------------------//
            InitiateSparklineCharts.init();
        });

    </script>
    

    @stack('scripts')
</body>
</html>
