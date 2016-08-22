<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>    
    <!-- Libs css -->
    <link href="{{Asset('assets/libs/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{Asset('assets/libs/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{Asset('assets/libs/croper/dist/cropper.min.css')}}" rel="stylesheet">    
    <link href="{{Asset('assets/libs/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{Asset('assets/libs/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <!-- Custom css -->
    <link href="{{Asset('assets/admin/css/custom.min.css')}}" rel="stylesheet">
    <link href="{{Asset('assets/admin/css/style.css')}}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
        @include('admin.elements.menu-left')

        @include('admin.elements.top-navigation')

        @include('admin.elements.notify')

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 class="title-content">@yield('title-content')</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    @yield('content')
                    
                  </div>
                </div>
              </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    
    <!-- Lis javascript -->
    <script src="{{Asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>    
    <script src="{{Asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>    
    <script src="{{Asset('assets/libs/fastclick/lib/fastclick.js')}}"></script>
    <script src="{{Asset('assets/libs/croper/dist/cropper.min.js')}}"></script>
    <script src="{{Asset('assets/libs/summernote/summernote.min.js')}}"></script>
    <script src="{{Asset('assets/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{Asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <!-- Custom javascript -->
    <script src="{{Asset('assets/admin/js/custom.min.js')}}"></script>
    <script src="{{Asset('assets/admin/js/editor.js')}}"></script>
    <script src="{{Asset('assets/admin/js/app.js')}}"></script>
  </body>
</html>
