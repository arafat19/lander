<!-- footer content -->
<div class="footer">
    <footer>
        <div class="pull-right">
            Planning & Implemented By:<?php echo ' ' . $footer_title;; ?>
        </div>
        <div class="clearfix"></div>
    </footer>
</div>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<!--<script src="--><?php //echo base_url(); ?><!--js/jquery.min.js"></script>-->
<script src="<?php echo base_url(); ?>js/jquery-1.12.4.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>js/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>js/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url(); ?>js/bootstrap-progressbar.js"></script>

<script src="<?php echo base_url(); ?>/js/bootstrap-colorpicker.js"></script>
<!-- Bootstrap Colorpicker -->
<script>
    $(document).ready(function() {
        $('.demo1').colorpicker();

        $('#demo_forceformat').colorpicker({
            format: 'rgba',
            horizontal: true
        });

        $('#demo_forceformat3').colorpicker({
            format: 'rgba',
        });

        $('.demo-auto').colorpicker();
    });
</script>
<!-- /Bootstrap Colorpicker -->
<!-- iCheck -->
<script src="<?php echo base_url(); ?>js/icheck.js"></script>
<!-- Skycons -->
<script src="<?php echo base_url(); ?>js/skycons.js"></script>
<!-- Flot -->
<script src="<?php echo base_url(); ?>js/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.flot.time.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.flot.stack.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url(); ?>js/jquery.flot.orderBars.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.flot.spline.js"></script>
<script src="<?php echo base_url(); ?>js/curvedLines.js"></script>
<!-- DateJS -->
<!--<script src="--><?php //echo base_url(); ?><!--js/date.js"></script>-->
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url(); ?>js/moment.min.js"></script>
<!--<script src="--><?php //echo base_url(); ?><!--js/daterangepicker.js"></script>-->

<script src="<?php echo base_url(); ?>framework/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>framework/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>framework/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>framework/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>framework/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>framework/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>framework/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>framework/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url(); ?>framework/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url(); ?>framework/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>framework/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>framework/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="<?php echo base_url(); ?>js/dataTables.select.min.js"></script>
<script src="<?php echo base_url(); ?>js/jszip.js"></script>
<script src="<?php echo base_url(); ?>js/pdfmake.js"></script>
<script src="<?php echo base_url(); ?>js/vfs_fonts.js"></script>

<!---->
<script src="<?= base_url() ?>js/jquery-ui.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>js/custom.min.js"></script>

<!-- Datatables -->
<script>
    $(document).ready(function () {
        var handleDataTableButtons = function () {
            if ($("#datatable-buttons").length) {
                var table = $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "pdf",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: 'print',
                            text: 'Print all',
                            className: "btn-sm"
                        },
                        {
                            extend: 'print',
                            text: 'Print selected',
                            className: "btn-sm",
                            exportOptions: {
                                modifier: {
                                    selected: true
                                }
                            }
                        }
                    ],
                    responsive: true,
                    select: true
                });
            }
        };

        TableManageButtons = function () {
            "use strict";
            return {
                init: function () {
                    handleDataTableButtons();
                }
            };
        }();




        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
            'order': [[1, 'asc']],
            'columnDefs': [
                {orderable: false, targets: [0]}
            ]
        });
        $datatable.on('draw.dt', function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });

        TableManageButtons.init();
    });
</script>
<!-- /Datatables -->

<!-- Flot -->
<script>
    $(document).ready(function () {
        var data1 = [
            [gd(2012, 1, 1), 17],
            [gd(2012, 1, 2), 74],
            [gd(2012, 1, 3), 6],
            [gd(2012, 1, 4), 39],
            [gd(2012, 1, 5), 20],
            [gd(2012, 1, 6), 85],
            [gd(2012, 1, 7), 7]
        ];

        var data2 = [
            [gd(2012, 1, 1), 82],
            [gd(2012, 1, 2), 23],
            [gd(2012, 1, 3), 66],
            [gd(2012, 1, 4), 9],
            [gd(2012, 1, 5), 119],
            [gd(2012, 1, 6), 6],
            [gd(2012, 1, 7), 9]
        ];
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
            data1, data2
        ], {
            series: {
                lines: {
                    show: false,
                    fill: true
                },
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 0.4
                },
                points: {
                    radius: 0,
                    show: true
                },
                shadowSize: 2
            },
            grid: {
                verticalLines: true,
                hoverable: true,
                clickable: true,
                tickColor: "#d5d5d5",
                borderWidth: 1,
                color: '#fff'
            },
            colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
            xaxis: {
                tickColor: "rgba(51, 51, 51, 0.06)",
                mode: "time",
                tickSize: [1, "day"],
                //tickLength: 10,
                axisLabel: "Date",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 10
            },
            yaxis: {
                ticks: 8,
                tickColor: "rgba(51, 51, 51, 0.06)",
            },
            tooltip: false
        });

        function gd(year, month, day) {
            return new Date(year, month - 1, day).getTime();
        }
    });
</script>
<!-- /Flot -->



<!-- Skycons -->
<script>
    $(document).ready(function () {
        var icons = new Skycons({
                "color": "#73879C"
            }),
            list = [
                "clear-day", "clear-night", "partly-cloudy-day",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
            ],
            i;

        for (i = list.length; i--;)
            icons.set(list[i], list[i]);

        icons.play();
    });
</script>
<!-- /Skycons -->

<!-- Doughnut Chart -->
<script>
    $(document).ready(function () {
        var options = {
            legend: false,
            responsive: false
        };

        new Chart(document.getElementById("canvas1"), {
            type: 'doughnut',
            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
            data: {
                labels: [
                    "Symbian",
                    "Blackberry",
                    "Other",
                    "Android",
                    "IOS"
                ],
                datasets: [{
                    data: [15, 20, 30, 10, 30],
                    backgroundColor: [
                        "#BDC3C7",
                        "#9B59B6",
                        "#E74C3C",
                        "#26B99A",
                        "#3498DB"
                    ],
                    hoverBackgroundColor: [
                        "#CFD4D8",
                        "#B370CF",
                        "#E95E4F",
                        "#36CAAB",
                        "#49A9EA"
                    ]
                }]
            },
            options: options
        });
    });
</script>
<!-- /Doughnut Chart -->



</body>
