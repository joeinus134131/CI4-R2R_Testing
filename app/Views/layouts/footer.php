<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright © 2022 <a href="https://infomedia.co.id">PT Infomedia Nusantara</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- PSPDKIT -->
<script src="<?= base_url('assets/dist/pspdfkit.js') ?>"></script>

<!-- jQuery -->
<script src="<?= base_url('adminLTE/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url('adminLTE/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>

<script src="<?= base_url('adminLTE/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('adminLTE/plugins/sparklines/sparkline.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>

<!-- AdminLTE Calender -->
<script src="<?= base_url('adminLTE/plugins/fullcalendar/main.js') ?>"></script>

<!-- AdminLTE App -->
<script src="<?= base_url('adminLTE/dist/js/adminlte.min.js') ?>"></script>
<script src="<?= base_url('adminLTE/plugins/bs-stepper/js/bs-stepper.min.js') ?>"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
<script>
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.worker.min.js';
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.3.0/fabric.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.2.0/jspdf.umd.min.js"></script>
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js"></script>
<script src="<?= base_url('assets/pdfanotate/arrow.fabric.js') ?>"></script>
<script src="<?= base_url('assets/pdfanotate/pdfannotate.js') ?>"></script>
<script src="<?= base_url('assets/pdfanotate/script.js') ?>"></script>
<script src="<?= base_url('assets/color-selector/js/bootstrap-colorselector.js') ?>"></script>
<script src="<?= base_url('assets/google-code-prettify/prettify.js') ?>"></script>

<!-- Page specific script -->
<script type="text/javascript">
    $('#colorselector').colorselector();

    $("#example1").DataTable({
        "paging": true,
        "responsive": true,
        "lengthChange": true,
        "autoWidth": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        scrollY: 400,
        scrollX: true,
    }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

    // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    // var areaChartData = {
    //     labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    //     datasets: [{
    //             label: 'Digital Goods',
    //             backgroundColor: 'rgba(60,141,188,0.9)',
    //             borderColor: 'rgba(60,141,188,0.8)',
    //             pointRadius: false,
    //             pointColor: '#3b8bba',
    //             pointStrokeColor: 'rgba(60,141,188,1)',
    //             pointHighlightFill: '#fff',
    //             pointHighlightStroke: 'rgba(60,141,188,1)',
    //             data: [28, 48, 40, 19, 86, 27, 90]
    //         },
    //         {
    //             label: 'Electronics',
    //             backgroundColor: 'rgba(210, 214, 222, 1)',
    //             borderColor: 'rgba(210, 214, 222, 1)',
    //             pointRadius: false,
    //             pointColor: 'rgba(210, 214, 222, 1)',
    //             pointStrokeColor: '#c1c7d1',
    //             pointHighlightFill: '#fff',
    //             pointHighlightStroke: 'rgba(220,220,220,1)',
    //             data: [65, 59, 80, 81, 56, 55, 40]
    //         },
    //     ]
    // }

    // var areaChartOptions = {
    //     maintainAspectRatio: false,
    //     responsive: true,
    //     legend: {
    //         display: false
    //     },
    //     scales: {
    //         xAxes: [{
    //             gridLines: {
    //                 display: false,
    //             }
    //         }],
    //         yAxes: [{
    //             gridLines: {
    //                 display: false,
    //             }
    //         }]
    //     }
    // }

    // This will get the first returned node in the jQuery collection.
    // new Chart(areaChartCanvas, {
    //     type: 'line',
    //     data: areaChartData,
    //     options: areaChartOptions
    // })

    //-------------
    //- LINE CHART -
    //--------------
    // var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    // var lineChartOptions = $.extend(true, {}, areaChartOptions)
    // var lineChartData = $.extend(true, {}, areaChartData)
    // lineChartData.datasets[0].fill = false;
    // lineChartData.datasets[1].fill = false;
    // lineChartOptions.datasetFill = false

    // var lineChart = new Chart(lineChartCanvas, {
    //     type: 'line',
    //     data: lineChartData,
    //     options: lineChartOptions
    // })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    // var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    // var donutData = {
    //     labels: [
    //         'Chrome',
    //         'IE',
    //         'FireFox',
    //         'Safari',
    //         'Opera',
    //         'Navigator',
    //     ],
    //     datasets: [{
    //         data: [700, 500, 400, 600, 300, 100],
    //         backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
    //     }]
    // }
    // var donutOptions = {
    //     maintainAspectRatio: false,
    //     responsive: true,
    // }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    // new Chart(donutChartCanvas, {
    //     type: 'doughnut',
    //     data: donutData,
    //     options: donutOptions
    // })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    // var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    // var pieData = donutData;
    // var pieOptions = {
    //     maintainAspectRatio: false,
    //     responsive: true,
    // }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    // new Chart(pieChartCanvas, {
    //     type: 'pie',
    //     data: pieData,
    //     options: pieOptions
    // })

    //-------------
    //- BAR CHART -
    //-------------
    // var barChartCanvas = $('#barChart').get(0).getContext('2d')
    // var barChartData = $.extend(true, {}, areaChartData)
    // var temp0 = areaChartData.datasets[0]
    // var temp1 = areaChartData.datasets[1]
    // barChartData.datasets[0] = temp1
    // barChartData.datasets[1] = temp0

    // var barChartOptions = {
    //     responsive: true,
    //     maintainAspectRatio: false,
    //     datasetFill: false
    // }

    // new Chart(barChartCanvas, {
    //     type: 'bar',
    //     data: barChartData,
    //     options: barChartOptions
    // })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    // var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    // var stackedBarChartData = $.extend(true, {}, barChartData)

    // var stackedBarChartOptions = {
    //     responsive: true,
    //     maintainAspectRatio: false,
    //     scales: {
    //         xAxes: [{
    //             stacked: true,
    //         }],
    //         yAxes: [{
    //             stacked: true
    //         }]
    //     }
    // }

    // new Chart(stackedBarChartCanvas, {
    //     type: 'bar',
    //     data: stackedBarChartData,
    //     options: stackedBarChartOptions
    // })
</script>
</body>

</html>