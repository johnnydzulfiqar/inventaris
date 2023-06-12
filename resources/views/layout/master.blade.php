<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('layout/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('layout/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('layout/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('layout/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('layout/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('layout/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('layout/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('layout/assets/js/config.js') }}"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>

<body>
    


    


    
     <!-- Layout wrapper -->
     <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
          <!-- Menu -->
          @include('partial.sidebar')
          
          <!-- / Menu -->
  
          <!-- Layout container -->
          <div class="layout-page">
            <!-- Navbar -->
  
            @include('partial.navbar')
  
            <!-- / Navbar -->
  
            <!-- Content wrapper -->
            <div class="content-wrapper">
              <!-- Content -->
              @yield('content')
              
              <!-- / Content -->
  
              <!-- Footer -->
              <footer class="content-footer footer bg-footer-theme">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                  <div class="mb-2 mb-md-0">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , Copy Right SMKN 1 Cimahi
                </div>
              </footer>
              <!-- / Footer -->
  
              <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
          </div>
          <!-- / Layout page -->
        </div>
  
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
      </div>
      
  <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('layout/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('layout/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('layout/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('layout/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('layout/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('layout/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('layout/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('layout/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
<!-- Datatable Dependency start -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
{{-- <!--DateRangePicker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- Datatable Dependency end --> --}}
<script>
  $(document).ready(function() {
            $('#table_id').DataTable({

                dom: 'Bfrtip',
                responsive: true,
                pageLength: 25,
                // lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],

                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            });
            
        });
// var start_date;
//  var end_date;
//  var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
//     var dateStart = parseDateValue(start_date);
//     var dateEnd = parseDateValue(end_date);
//     //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
//     //nama depan = 0
//     //nama belakang = 1
//     //tanggal terdaftar =2
//     var evalDate= parseDateValue(aData[2]);
//       if ( ( isNaN( dateStart ) && isNaN( dateEnd ) ) ||
//            ( isNaN( dateStart ) && evalDate <= dateEnd ) ||
//            ( dateStart <= evalDate && isNaN( dateEnd ) ) ||
//            ( dateStart <= evalDate && evalDate <= dateEnd ) )
//       {
//           return true;
//       }
//       return false;
// });

// // fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
// function parseDateValue(rawDate) {
//     var dateArray= rawDate.split("/");
//     var parsedDate= new Date(dateArray[2], parseInt(dateArray[1])-1, dateArray[0]);  // -1 because months are from 0 to 11   
//     return parsedDate;
// }    

// $( document ).ready(function() {
// //konfigurasi DataTable pada tabel dengan id example dan menambahkan  div class dateseacrhbox dengan dom untuk meletakkan inputan daterangepicker
//  var $dTable = $('#example').DataTable({
//   "dom": "<'row'<'col-sm-4'l><'col-sm-5' <'datesearchbox'>><'col-sm-3'f>>" +
//     "<'row'<'col-sm-12'tr>>" +
//     "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    
//  });

//  //menambahkan daterangepicker di dalam datatables
//  $("div.datesearchbox").html('<div class="input-group"> <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar"></i> </div><input type="text" class="form-control pull-right" id="datesearch" placeholder="Search by date range.."> </div>');

//  document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";

//  //konfigurasi daterangepicker pada input dengan id datesearch
//  $('#datesearch').daterangepicker({
//     autoUpdateInput: false
//   });

//  //menangani proses saat apply date range
//   $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
//      $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
//      start_date=picker.startDate.format('DD/MM/YYYY');
//      end_date=picker.endDate.format('DD/MM/YYYY');
//      $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
//      $dTable.draw();
//   });

//   $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
//     $(this).val('');
//     start_date='';
//     end_date='';
//     $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
//     $dTable.draw();
//   });
// });

</script>