<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href={{ asset('css/fontawesome-free/css/all.min.css')}} rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/calendar.css')}}" rel="stylesheet">



</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        {{--<div class="sidebar-brand-icon rotate-n-15">--}}
          {{--<i class="fas fa-child"></i>--}}
        {{--</div>--}}
        <div class="sidebar-brand-text mx-3">Family Reward</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Main Menu
      </div>

        @if(Session::get('role') == 'parent')
        <li class="nav-item <?php if (Request::segment(1) == 'dashboardparent') echo 'active'?>" >
            <a class="nav-link" href="{{ url('dashboardparent') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item <?php if (Request::segment(1) == 'childlist') echo 'active'?>" >
          <a class="nav-link" href="{{ url('childlist') }}">
            <i class="fas fa-fw fa-child"></i>
            <span>List Anak</span></a>
        </li>
        @else
            <li class="nav-item <?php if (Request::segment(1) == 'dashboardchild') echo 'active'?>">
                <a class="nav-link " href="{{ url('dashboardchild') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard Anak</span></a>
            </li>
        <li class="nav-item <?php if (Request::segment(1) == 'listtaskchild') echo 'active'?>">
          <a class="nav-link" href="{{ url('listtaskchild') }}">
            <i class="fas fa-fw fa-tasks"></i>
            <span>List Tugas</span></a>
        </li>
        <li class="nav-item <?php if (Request::segment(1) == 'listrewardchild') echo 'active'?>">
          <a class="nav-link"  href="{{ url('listrewardchild') }}">
            <i class="fas fa-fw fa-gifts"></i>
            <span>List Reward</span></a>
        </li>
        @endif

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <!-- Nav Item - User Information -->

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @php
                  $getPoint = DB::table('child')->where('id','=',Session::get('idChild'))->get();
                  $getParentData = DB::table('parent')->where('id','=',Session::get('idParent'))->get();
                @endphp
                  @if(Session::get('role') == 'child')
                    @foreach($getPoint as $getPoints)
                <span class="mr-lg-5 d-none d-lg-inline text-white" style="background-color: #486EDB;padding: 10px;border-radius: 20px;">Point Kamu Saat Ini : <b>{{ $getPoints->child_point }}</b></span>
                  @endforeach
                  @endif
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Session::get('name') }}</span>
                @foreach($getParentData as $getParentDatas)
                <img class="img-profile rounded-circle" src="{{ asset('img/'.$getParentDatas->photo) }}" style="width: 30px;height: 30px;">
                  @endforeach
                @foreach($getPoint as $getPoints)
                  <img class="img-profile rounded-circle" src="{{ asset('img/'.$getPoints->photo) }}" style="width: 30px;height: 30px;">
                @endforeach
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                @if(Session::get('role') == 'parent')
                <a class="dropdown-item" href="{{ url('parentprofile') }}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                @endif
                  @if(Session::get('role') == 'child')
                      <a class="dropdown-item" href="{{ url('logoutchild') }}">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Logout
                      </a>
                  @else
                <a class="dropdown-item" href="{{ url('logoutparent') }}">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
                  @endif
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- MAIN CONTENNNNNNNNNNNN -->
           @yield('content')
        <!-- /.container-fluid -->
      </div>
          <div class="spacer" style="padding: 30px 0 30px 0"></div>
      <!-- End of Main Content -->

      <!-- Footer -->
      {{--<footer class="sticky-footer bg-white">--}}
        {{--<div class="container my-auto">--}}
          {{--<div class="copyright text-center my-auto">--}}
            {{--<span>Copyright &copy; Your Website 2020</span>--}}
          {{--</div>--}}
        {{--</div>--}}
      {{--</footer>--}}
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  @if (!Session::get('isLogin'))
    echo "<script>
        alert('maaf sesi telah berakhir harap login kembali');
        window.location.href = '{{ url('/') }}'
    </script>"
  @endif


  <!-- Bootstrap core JavaScript-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/datatables-demo.js') }}"></script>
  <script src="{{ asset('js/custom-datatables.js') }}"></script>
  <script src="{{ asset('js/check-session.js') }}"></script>
  <script src="{{ asset('js/calendar.js') }}"></script>
  <script src="{{ asset('js/modal-custom.js') }}"></script>



</body>

</html>
