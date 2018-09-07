<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="">
    <meta name="author" content="Mohamed Samir">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/bootstrap-reset.css', true) }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/dcjqaccordion@2.7.1/css/dcaccordion.css" rel="stylesheet">
    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    
    <!--external css-->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.min1.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/toastr.min.css', true)}}">
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css', true) }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css', true) }}" rel="stylesheet" />
    <!-- Styles -->
    @yield('style')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <section id="container" class="">
      {{-- Header --}}
      @include('admin.layouts.header')

      {{-- SideBar --}}
      @include('admin.layouts.sidebar')

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <div id="app">
                <!-- page start-->
                @yield('content')
                <!-- page end-->
              </div>
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2018 &copy; My Blog.
              <a href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script src="{{ asset('js/jquery.dcjqaccordion.2.7.js', true) }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.min.js', true) }}"></script>
    <script src="{{ asset('js/toastr.min.js', true) }}"></script>

    <!--common script for all pages-->
    <script src="{{ asset('js/common-scripts.js', true) }}"></script>
    
    <script>
      $(document).ready(function() {
        @if(session()->has('success'))
          toastr.success("{{ session()->get('success') }}");
        @endif
        @if(session()->has('error'))
          toastr.error("{{ session()->get('error') }}");
        @endif
        @if(session()->has('info'))
          toastr.info("{{ session()->get('info') }}");
        @endif
        $('#content').summernote({
          height: 300,
          minHeight: null,
          maxHeight: null,
        });
        $('#example').DataTable();
      });
    </script>
    
  </body>
</html>
