<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="{{asset('backend/images/favicon.ico')}}"> -->

    <title>@yield('title')</title>

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{asset('backend/vendor_components/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- Data Table-->
    <link rel="stylesheet" href="{{asset('backend/vendor_components/datatable/datatables.min.css')}}">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap-extend.css')}}">

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('backend/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('backend/vendor_plugins/iCheck/all.css')}}">

    <!-- Bootstrap touchspin -->
    <link rel="stylesheet" href="{{asset('backend/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}">



    <!-- Select2 -->
  	<link rel="stylesheet" href="{{asset('backend//vendor_components/select2/dist/css/select2.min.css')}}">

    <!-- theme style -->
    <link rel="stylesheet" href="{{asset('backend/css/master_style.css')}}">

    <!-- Superieur Admin skins -->
    <link rel="stylesheet" href="{{asset('backend/css/skins/_all-skins.css')}}">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="hold-transition skin-info-light sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
      </header>

      <aside class="main-sidebar">
        <!-- sidebar-->
        <section class="sidebar">
          <!-- sidebar menu-->
          <ul class="sidebar-menu" data-widget="tree">
            <li>
              <a href="{{route('dashboard.index')}}" class="dropdown-item" href="javascript:void(0)"><i class="fa fa-home"></i>Dashboard</a>
              <a href="{{route('users.edit', auth()->user()->id)}}" class="dropdown-item" href="javascript:void(0)"><i class="ion ion-person"></i>My Profile</a>
              @if(auth()->user()->role == 'admin')
              <a href="{{route('users.index')}}" class="dropdown-item" href="javascript:void(0)"><i class="menu-icon fa fa-list"></i>Users</a>
              @endif
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ion-log-out"></i> Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>

          </ul>
        </section>
      </aside>

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="d-flex align-items-center">
            <div class="mr-auto">
              <h3 class="page-title">@yield('title')</h3>
              <div class="d-inline-block align-items-center">
                <nav>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                    @yield('breadcrumb')
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>


        <!-- Main content -->
        <section class="content">
          @include('layouts.message')
          @yield('content')
        </section>
        <!-- /.content -->
      </div>

      <div class="modal modal-danger fade" id="modelDelete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
              <div class="modal-body">
                <p>Are you sure do you want to delete this Data?&hellip;</p>
              </div>
              <div class="modal-footer">
                <form action="" method="post" id="formDelete" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="button" class="btn btn-outline btn-white" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-outline btn-white float-right">Yes</button>
                </form>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <footer class="main-footer">
        &copy; 2021 <a href="#">M H M Arafath</a>. All Rights Reserved.
      </footer>
    </div>



    <!-- jQuery 3 -->
    <script src="{{asset('backend/vendor_components/jquery-3.3.1/jquery-3.3.1.js')}}"></script>

    <!-- popper -->
    <script src="{{asset('backend/vendor_components/popper/dist/popper.min.js')}}"></script>

    <!-- Bootstrap 4.0-->
    <script src="{{asset('backend/vendor_components/bootstrap/dist/js/bootstrap.js')}}"></script>

    <!-- Slimscroll -->
    <script src="{{asset('backend/vendor_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- FastClick -->
    <script src="{{asset('backend/vendor_components/fastclick/lib/fastclick.js')}}"></script>

    <!-- Superieur Admin App -->
    <script src="{{asset('backend/js/template.js')}}"></script>

    <!-- Superieur Admin for demo purposes -->
    <script src="{{asset('backend/js/demo.js')}}"></script>

    <!-- This is data table -->
    <script src="{{asset('backend/vendor_components/datatable/datatables.min.js')}}"></script>

    <!-- Superieur Admin for Data Table -->
{{--    <script src="{{asset('backend/js/pages/data-table.js')}}"></script>--}}

    <!-- Bootstrap Select -->
  	<script src="{{asset('backend/vendor_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>

    <!-- Select2 -->
  	<script src="{{asset('backend/vendor_components/select2/dist/js/select2.full.js')}}"></script>



    <!-- Bootstrap touchspin -->
    <script src="{{asset('backend/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>


  	<!-- Form validator JavaScript -->
    <script src="{{asset('backend/js/pages/validation.js')}}"></script>
    <script src="{{asset('backend/js/pages/form-validation.js')}}"></script>


    <!-- InputMask -->
    <script src="{{asset('backend/vendor_plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{asset('backend/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{asset('backend/vendor_plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>

    <!-- bootstrap datepicker -->
    <script src="{{asset('backend/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

    <!-- Superieur Admin for advanced form element -->
    <script src="{{asset('backend/js/pages/advanced-form-element.js')}}"></script>

    <script>
    $(document).ready(function(){
      $('.dataTable').DataTable();

      $('.btnDelete').click(function(event){
          url = $(this).data("url");
          document.getElementById("formDelete").action = url;
          $("#modelDelete").modal("show");
      });

      $('form').attr('novalidate', true);

      //Date picker
      $('#datepicker').datepicker({
        autoclose: true,
        format:'yyyy-mm-dd'
      });

    });
    </script>



    @yield('script')

  </body>
</html>
