<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Focus Admin: Admin UI</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="<?=asset('assets/css/lib/weather-icons.css');?>" rel="stylesheet" />
    <link href="<?=asset('assets/css/lib/owl.carousel.min.css');?>" rel="stylesheet" />
    <link href="<?=asset('assets/css/lib/owl.theme.default.min.css');?>" rel="stylesheet" />
    <link href="<?=asset('assets/css/lib/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?=asset('assets/css/lib/themify-icons.css');?>" rel="stylesheet">
    <link href="<?=asset('assets/css/lib/menubar/sidebarn.css');?>" rel="stylesheet">
    <link href="<?=asset('assets/css/lib/bootstrap.min.css');?>" rel="stylesheet">

    <link href="<?=asset('assets/css/lib/helper.css');?>" rel="stylesheet">
    <link href="<?=asset('assets/css/styles.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link href="<?=asset('assets/css/lib/select2.css" rel="stylesheet');?>" />

</head>

<body>

@include('includes.header')
<!-- /# sidebar -->
@include('includes.menu')


<div  class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div  class="row">
                <div class="col-lg-8 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title" >
                            <ol   class="breadcrumb" >
                                <li class="breadcrumb-item active" ><a href="#">داشبورد</a></li>
                                <li class="breadcrumb-item "><a href="#">صفحه اصلی</a></li>


                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div  style="float: left" class="page-title">
                            <h1>سلام خوش آمدید</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content -->
            @yield('content')
            <footer>
                @include('includes.footer')
            </footer>



        </div>
    </div>
</div>

<!-- jquery vendor -->
<script src="<?=asset('assets/js/lib/jquery.nanoscroller.min.js');?>"></script>
<!-- nano scroller -->
<script src="<?=asset('assets/js/lib/menubar/sidebar.js');?>"></script>
<script src="<?=asset('assets/js/lib/preloader/pace.min.js');?>"></script>
<!-- sidebar -->
<script src="<?=asset('assets/js/lib/bootstrap.min.js');?>"></script>

<!-- bootstrap -->

<script src="<?=asset('assets/js/lib/circle-progress/circle-progress.min.js');?>"></script>
<script src="<?=asset('assets/js/lib/circle-progress/circle-progress-init.js');?>"></script>

<script src="<?=asset('assets/js/lib/morris-chart/raphael-min.js');?>"></script>
<script src="<?=asset('assets/js/lib/morris-chart/morris.js');?>"></script>
<script src="<?=asset('assets/js/lib/morris-chart/morris-init.js');?>"></script>

<!--  flot-chart js -->
<script src="<?=asset('assets/js/lib/flot-chart/jquery.flot.js');?>"></script>
<script src="<?=asset('assets/js/lib/flot-chart/jquery.flot.resize.js');?>"></script>
<script src="<?=asset('assets/js/lib/flot-chart/flot-chart-init.js');?>"></script>
<!-- // flot-chart js -->


<script src="<?=asset('assets/js/lib/vector-map/jquery.vmap.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/jquery.vmap.min.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/jquery.vmap.sampledata.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/country/jquery.vmap.world.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/country/jquery.vmap.algeria.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/country/jquery.vmap.argentina.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/country/jquery.vmap.brazil.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/country/jquery.vmap.france.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/country/jquery.vmap.germany.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/country/jquery.vmap.greece.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/country/jquery.vmap.iran.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/country/jquery.vmap.iraq.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/country/jquery.vmap.russia.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/country/jquery.vmap.tunisia.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/country/jquery.vmap.europe.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/country/jquery.vmap.usa.js');?>"></script>
<!-- scripit init-->
<script src="<?=asset('assets/js/lib/vector-map/vector.init.js');?>"></script>

<script src="<?=asset('assets/js/lib/weather/jquery.simpleWeather.min.js');?>"></script>
<script src="<?=asset('assets/js/lib/weather/weather-init.js');?>"></script>
<script src="<?=asset('assets/js/lib/owl-carousel/owl.carousel.min.js');?>"></script>
<script src="<?=asset('assets/js/lib/owl-carousel/owl.carousel-init.js');?>"></script>
<script src="<?=asset('assets/js/scripts.js');?>"></script>
<script src=https://code.jquery.com/jquery-3.3.1.js></script>
<script src=https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js></script>
<script src="<?=asset('assets/js/lib/select2.js');?>"></script>
<script>

    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Persian.json"
            }
        });
    } );

</script>
<script>
    $('#manager').select2({
        placeholder:'choose a username',
        manager:true,
        allowClear:true
    })
</script>
<!-- scripit init-->

</body>

</html>
