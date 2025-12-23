
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>CARRENTAL</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('images/apple-touch-icon.png')}}">
    @yield('css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="{{asset('jquery/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('jquery/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('jquery/jquery-ui.structure.css')}}">
    <link rel="stylesheet" href="{{asset('jquery/jquery-ui.theme.css')}}">
    <link rel="stylesheet" href="{{asset('jquery/jquery-ui.theme.min.css')}}">
    <link rel="stylesheet" href="jquery.datatimepicker.min.css">
    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/loading.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <div id="progressbar"></div>
  <div id="scrollPath"></div>

  {{-- <div class="preload">
    <img class="airplane" src="./maincss/airplane.png" alt="airplane">
    <h3>Please wait few second...</h3>
    <img class="cloud1" src="./maincss/cloud.png" alt="cloud1">
    <img class="cloud2" src="./maincss/cloud.png" alt="cloud2">
    <img class="cloud3" src="./maincss/cloud.png" alt="cloud3">
  </div> --}}

    <section>
    @include('mainview.layouts.header')

    @yield('content')

    @include('mainview.layouts.footer')

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>
    </section>

    <!-- ALL JS FILES -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('js/jquery.superslides.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.js')}}"></script>
    <script src="{{asset('js/inewsticker.js')}}"></script>
    @yield('scripts')
    <script src="{{asset('js/bootsnav.js')}}"></script>
    <!-- <script src="{{asset('jquery/external/jquery/jquery.js')}}"></script> -->
    <script src="{{asset('jquery/jquery-ui.js')}}"></script>
    <script src="{{asset('jquery/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/images-loded.min.js')}}"></script>
    <script src="{{asset('js/isotope.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/baguetteBox.min.js')}}"></script>
    <script src="{{asset('js/form-validator.min.js')}}"></script>
    <script src="{{asset('js/contact-form-script.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script>
      $(document).ready( function () {
        $('#table_id').DataTable();
      });
    </script>

    <script>
      $('#picker1').datetimepicker({
          timepicker: true,
          datepicker: true,
          // format: 'Y-m-d H:i',
          // format: 'd-m-Y H:i',
          hours12: false,
          step: 1
      })
    </script>

    <script>
      $('#picker2').datetimepicker({
          timepicker: true,
          datepicker: true,
          // format: 'Y-m-d H:i',
          // format: 'd-m-Y H:i',
          hours12: false,
          step: 1
      })
    </script>
    
    <script>
      let progress =document.getElementById('progressbar');
      let totalHeight = document.body.scrollHeight - window.innerHeight;
      window.onscroll = function() {
        let progressHeight = (window.pageYOffset / totalHeight) * 100;
        progress.style.height = progressHeight +"%";
      }
    </script>
    {{-- <script src="{{asset('js/app1.js')}}"></script> --}}
  </body>

</html>