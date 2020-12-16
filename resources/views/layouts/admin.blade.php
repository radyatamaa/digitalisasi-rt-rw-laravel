<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ trans('global.site_title') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="dist/img/Logo1b.png" alt="AdminLTE Logo" width="200" height="60" style="opacity: .8">
        <!-- <span class="brand-text font-weight-light">SIDAK CMS</span> -->
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{$user}}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="{{ route("admin.index") }}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>

            @can('warga_access')
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Warga
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route("admin.warga.index") }}" class="nav-link {{ request()->is('admin/warga') || request()->is('admin/warga/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Warga</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route("admin.warga.index") . '?is_import=true'}}" class="nav-link {{ request()->is('admin/warga?is_import=true') || request()->is('admin/warga?is_import=true') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Import Excel</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan
            @can('keuangan_access')
            <li class="nav-item">
              <a href="{{ route("admin.keuangan.index") }}" class="nav-link {{ request()->is('admin/keuangan') || request()->is('admin/keuangan/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Keuangan
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            @endcan
            @can('event_access')
            <li class="nav-item active">
              <a href="{{ route("admin.event.index") }}" class="nav-link {{ request()->is('admin/event') || request()->is('admin/event/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Event
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            @endcan
            @can('insidental_access')
            <li class="nav-item">
              <a href="{{ route("admin.insidental.index") }}" class="nav-link {{ request()->is('admin/insidental') || request()->is('admin/insidental/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Insidental
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            @endcan
            @can('history_warga_access')
            <li class="nav-item">
              <a href="{{ route("admin.history_warga.index") }}" class="nav-link {{ request()->is('admin/history_warga') || request()->is('admin/history_warga  /*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>History Warga</p>
              </a>
            </li>
            @endcan
            @can('sdm_access')
            <li class="nav-item">
              <a href="{{ route("admin.sdm.index") }}" class="nav-link {{ request()->is('admin/sdm') || request()->is('admin/sdm  /*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>SDM</p>
              </a>
            </li>
            @endcan
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Master Data
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can('rt_access')
                <li class="nav-item">
                  <a href="{{ route("admin.rt.index") }}" class="nav-link {{ request()->is('admin/rt') || request()->is('admin/rt/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>RT</p>
                  </a>
                </li>
                @endcan
                @can('rw_access')
                <li class="nav-item">
                  <a href="{{ route("admin.rw.index") }}" class="nav-link {{ request()->is('admin/rw') || request()->is('admin/rw/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>RW</p>
                  </a>
                </li>
                @endcan
                @can('kelurahan_access')
                <li class="nav-item">
                  <a href="{{ route("admin.kelurahan.index") }}" class="nav-link {{ request()->is('admin/kelurahan') || request()->is('admin/kelurahan/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kelurahan</p>
                  </a>
                </li>
                @endcan
                @can('master_alamat_access')
                <li class="nav-item">
                  <a href="{{ route("admin.master_alamat.index") }}" class="nav-link {{ request()->is('admin/master_alamat') || request()->is('admin/master_alamat/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Address Code</p>
                  </a>
                </li>
                @endcan
                @can('master_agama_access')
                <li class="nav-item">
                  <a href="{{ route("admin.master_agama.index") }}" class="nav-link {{ request()->is('admin/master_agama') || request()->is('admin/master_agama/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Agama</p>
                  </a>
                </li>
                @endcan
                @can('master_pekerjaan_access')
                <li class="nav-item">
                  <a href="{{ route("admin.master_pekerjaan.index") }}" class="nav-link {{ request()->is('admin/master_pekerjaan') || request()->is('admin/master_pekerjaan/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pekerjaan</p>
                  </a>
                </li>
                @endcan
                @can('master_gaji_access')
                <li class="nav-item">
                  <a href="{{ route("admin.master_gaji.index") }}" class="nav-link {{ request()->is('admin/master_gaji') || request()->is('admin/master_gaji/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gaji</p>
                  </a>
                </li>
                @endcan
                @can('pendidikan_access')
                <li class="nav-item">
                  <a href="{{ route("admin.pendidikan.index") }}" class="nav-link {{ request()->is('admin/pendidikan') || request()->is('admin/pendidikan/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pendidikan</p>
                  </a>
                </li>
                @endcan
                @can('sekolah_access')
                <li class="nav-item">
                  <a href="{{ route("admin.sekolah.index") }}" class="nav-link {{ request()->is('admin/sekolah') || request()->is('admin/sekolah/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sekolah</p>
                  </a>
                </li>
                @endcan
                @can('pendidikan_access')
                <li class="nav-item">
                  <a href="{{ route("admin.pendidikan.index") }}" class="nav-link {{ request()->is('admin/pendidikan') || request()->is('admin/pendidikan/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pendidikan</p>
                  </a>
                </li>
                @endcan
                @can('sekolah_access')
                <li class="nav-item">
                  <a href="{{ route("admin.sekolah.index") }}" class="nav-link {{ request()->is('admin/sekolah') || request()->is('admin/sekolah/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sekolah</p>
                  </a>
                </li>
                @endcan
                @can('wilayah_access')
                <li class="nav-item">
                  <a href="{{ route("admin.wilayah.index") }}" class="nav-link {{ request()->is('admin/wilayah') || request()->is('admin/wilayah  /*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Wilayah</p>
                  </a>
                </li>
                @endcan
                @can('history_category_access')
                <li class="nav-item">
                  <a href="{{ route("admin.history_category.index") }}" class="nav-link {{ request()->is('admin/history_category') || request()->is('admin/history_category  /*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori Histori</p>
                  </a>
                </li>
                @endcan
                @can('keuangan_category_access')
                <li class="nav-item">
                  <a href="{{ route("admin.keuangan_category.index") }}" class="nav-link {{ request()->is('admin/keuangan_category') || request()->is('admin/keuangan_category  /*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori Keuangan</p>
                  </a>
                </li>
                @endcan
                @can('event_category_access')
                <li class="nav-item">
                  <a href="{{ route("admin.event_category.index") }}" class="nav-link {{ request()->is('admin/event_category') || request()->is('admin/event_category  /*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori Event</p>
                  </a>
                </li>
                @endcan
                @can('insidental_category_access')
                <li class="nav-item">
                  <a href="{{ route("admin.insidental_category.index") }}" class="nav-link {{ request()->is('admin/insidental_category') || request()->is('admin/insidental_category  /*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori Insidental</p>
                  </a>
                </li>
                @endcan
                @can('sdm_category_access')
                <li class="nav-item">
                  <a href="{{ route("admin.sdm_category.index") }}" class="nav-link {{ request()->is('admin/sdm_category') || request()->is('admin/sdm_category  /*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori SDM</p>
                  </a>
                </li>
                @endcan
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Setting
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can('permission_access')
                <li class="nav-item">
                  <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Permissions</p>
                  </a>
                </li>
                @endcan
                @can('role_access')
                <li class="nav-item">
                  <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Roles</p>
                  </a>
                </li>
                @endcan
                @can('user_access')
                <li class="nav-item">
                  <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Users</p>
                  </a>
                </li>
                @endcan
              </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Reports
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item active">
                  <a href="{{ route("admin.report_data_masyarakat_km.index") . '?report_keuangan' }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Report Keuangan</p>
                  </a>
                </li>
                <li class="nav-item active">
                  <a href="{{ route("admin.report_data_masyarakat_km.index") . '?report_event' }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Report Event</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route("admin.report_data_masyarakat_km.index") . '?report_pergerakan_warga' }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Report Pergerakan Warga</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{ route("admin.logout.index") }}" class="nav-link {{ request()->is('admin/logout') || request()->is('admin/logout/*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Logout
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route("admin.index") }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$wargaBerdomisili}}</h3>

                  <p>Warga Berdomisili</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$wargaNonBerdomisili}}</h3>

                  <p>Warga Bukan Berdomisili</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$perempuan}}</h3>

                  <p>Perempuan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$lakiLaki}}</h3>

                  <p>Laki-Laki</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
            </div>
            <!-- ./col -->
          </div>
          <div class="row">
            <div class="col-md-6">
              <!-- AREA CHART -->
              <div hidden class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Area Chart</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- PIE CHART -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Agama</h3>


                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- STACKED BAR CHART -->
              <div hidden class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">RW 1</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
            <!-- /.col (LEFT) -->


            <div class="col-md-6">

              <!-- DONUT CHART -->
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Pekerjaan</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- LINE CHART -->
              <div hidden class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Line Chart</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            @if(count($wargaPendudukRec) > 0)
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Penambahan penduduk 3 bulan terakhir</h3>
                  <!-- <a href="javascript:void(0);">View Report</a> -->
                </div>
              </div>
              <div class="card-body">
                <!-- <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p>
                </div> -->
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Pindah
                  </span>

                  <span class="mr-2">
                    <i class="fas fa-square text-danger"></i> Masuk
                  </span>

                  <span class="mr-2">
                    <i class="fas fa-square text-info"></i> lahir
                  </span>
                </div>
              </div>
            </div>

            @endif

            </div>
            <!-- /.col (RIGHT) -->
          </div>

          <div class="row">
            @if(count($rtArray) > 0)
            <div class="col-md-12">

              <!-- BAR CHART -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">{{ $rtArray[0]->rw_name}}</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="rtbarChart{{$rtArray[0]->rw_id}}" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>

            @foreach($rtArray as $rt)
            @foreach($rt->eventCategorys as $rtEvent)
            @if($rtEvent->eventWargaCountikut != 0 || $rtEvent->eventWargaCountTidakIkut != 0)
            <div class="col-md-3">

              <!-- BAR CHART -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">{{ $rtEvent->categoryName}}</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              <div class="card-body">
              <div class="chart">
              <canvas id="eventbarChart{{$rtEvent->category_id}}" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              </div>
               <!-- /.card-body -->
              </div>
                <!-- /.card -->
         </div>
          @endif
          @endforeach
          @endforeach

          @endif

            @if(count($rwArray) > 0)
            <div class="col-md-12">

              <!-- BAR CHART -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">{{ $rwArray[0]->kel_name}}</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="rwbarChart{{$rwArray[0]->kel_id}}" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>

            @foreach($rwArray as $rt)
            @foreach($rt->eventCategorys as $rtEvent)
            @if($rtEvent->eventWargaCountikut != 0 || $rtEvent->eventWargaCountTidakIkut != 0)
            <div class="col-md-3">

              <!-- BAR CHART -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">{{ $rtEvent->categoryName}}</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              <div class="card-body">
              <div class="chart">
              <canvas id="eventbarChart{{$rtEvent->category_id}}" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              </div>
               <!-- /.card-body -->
              </div>
                <!-- /.card -->
         </div>
          @endif
          @endforeach
          @endforeach

          @endif

          </div>


          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
  <!-- JQVMap -->
  <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('dist/js/demo.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  

  <script>
    $(function() {
    
@if(count($wargaPendudukRec) > 0)
    var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
    }
    var mode      = 'index'
    var intersect = true
    var $visitorsChart = $('#visitors-chart')

    var monthPenduduk = [];
    var pindahPenduduk = [];
    var masukPenduduk = [];
    var lahirPenduduk = [];
    var maxPenduduk = [];
    @foreach($wargaPendudukRec as $key => $penduduk)

    monthPenduduk.push("{{$penduduk->month}}");
    pindahPenduduk.push("{{$penduduk->pindah}}");
    masukPenduduk.push("{{$penduduk->masuk}}");
    lahirPenduduk.push("{{$penduduk->lahir}}");
    maxPenduduk.push("{{$penduduk->max}}");

    @endforeach

    maxPenduduk.sort(function(a, b) {
       return b - a;
    });
   

    var visitorsChart  = new Chart($visitorsChart, {
    data   : {
      labels  : monthPenduduk,
      datasets: [{
        type                : 'line',
        data                : masukPenduduk,
        backgroundColor     : 'transparent',
        borderColor         : '#FF0000',
        pointBorderColor    : '#FF0000',
        pointBackgroundColor: '#FF0000',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
      {
        type                : 'line',
        data                : lahirPenduduk,
        backgroundColor     : 'transparent',
        borderColor         : '#00FFFF',
        pointBorderColor    : '#00FFFF',
        pointBackgroundColor: '#00FFFF',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
        {
          type                : 'line',
          data                : pindahPenduduk,
          backgroundColor     : 'tansparent',
          borderColor         : '#0000FF',
          pointBorderColor    : '#0000FF',
          pointBackgroundColor: '#0000FF',
          fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
            suggestedMax: maxPenduduk[0]
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })

@endif
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      //--------------
      //- AREA CHART -
      //--------------

      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

      var areaChartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Digital Goods',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: [28, 48, 40, 19, 86, 27, 90]
          },
          {
            label: 'Electronics',
            backgroundColor: 'rgba(210, 214, 222, 1)',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [65, 59, 80, 81, 56, 55, 40]
          },
        ]
      }


      var areaChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false,
            }
          }],
          yAxes: [{
            gridLines: {
              display: false,
            }
          }]
        }
      }

      // This will get the first returned node in the jQuery collection.
      var areaChart = new Chart(areaChartCanvas, {
        type: 'line',
        data: areaChartData,
        options: areaChartOptions
      })

      //-------------
      //- LINE CHART -
      //--------------
      var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
      var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
      var lineChartData = jQuery.extend(true, {}, areaChartData)
      lineChartData.datasets[0].fill = false;
      lineChartData.datasets[1].fill = false;
      lineChartOptions.datasetFill = false

      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineChartData,
        options: lineChartOptions
      })

      //-------------
      //- DONUT CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData = {
        labels: [

        ],
        datasets: [{
          data: [

          ],
          backgroundColor: [

          ],
        }]
      }

      @foreach($pekerjaanArray as $key => $pekerjaan)

      donutData.labels.push("{{$pekerjaan->nama_pekerjaan}}");
      donutData.datasets[0].data.push("{{$pekerjaan->count}}");
      donutData.datasets[0].backgroundColor.push("{{$pekerjaan->backgroundColor}}");

      @endforeach

      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      var donutChart = new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })


      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData = {
        labels: [

        ],
        datasets: [{
          data: [

          ],
          backgroundColor: [

          ],
        }]
      }
      @foreach($agamaArray as $key => $agama)

      pieData.labels.push("{{$agama->nama_agama}}");
      pieData.datasets[0].data.push("{{$agama->count}}");
      pieData.datasets[0].backgroundColor.push("{{$agama->backgroundColor}}");

      @endforeach

      var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      })



      @if(count($rtArray) > 0)

      //-------------
      //- BAR CHART -
      //-------------

      var areaChartData1 = {
        labels: [],
        datasets: [{
            label: 'Warga Berdomisili',
            backgroundColor: '#f56954',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: []
          },
          {
            label: 'Warga Bukan Berdomisili',
            backgroundColor: '#00a65a',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: []
          },
          {
            label: 'Laki-Laki ',
            backgroundColor: '#00c0ef',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: []
          },
          {
            label: 'Perempuan',
            backgroundColor: '#f39c12',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: []
          },
        ]
      }


      @foreach($rtArray as $index => $rtObj)

      @if($rtObj->wargaBerdomisiliCount > 0 ||
        $rtObj->wargaNonBerdomisiliCount > 0 ||
        $rtObj->lakiLakiCount > 0 ||
        $rtObj->perempuanCount > 0)

      areaChartData1.labels.push('{{$rtObj->rt_name}}')
      areaChartData1.datasets[0].data.push({{$rtObj->wargaBerdomisiliCount}})
      areaChartData1.datasets[1].data.push({{$rtObj->wargaNonBerdomisiliCount}})
      areaChartData1.datasets[2].data.push({{$rtObj->lakiLakiCount}})
      areaChartData1.datasets[3].data.push({{$rtObj->perempuanCount}})

      @endif

      @foreach($rtObj->eventCategorys as $rtEvent)
      @if($rtEvent->eventWargaCountikut != 0 || $rtEvent->eventWargaCountTidakIkut != 0)
      var areaChartDataEvent = {
        labels: [],
        datasets: [{
            label: 'Warga Ikut',
            backgroundColor: '#f56954',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: []
          },
          {
            label: 'Warga Tidak Ikut',
            backgroundColor: '#00a65a',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: []
          },
        ]
      }
      areaChartDataEvent.labels.push('{{$rtObj->rt_name}}')
      areaChartDataEvent.datasets[0].data.push({{$rtEvent->eventWargaCountikut}})
      areaChartDataEvent.datasets[1].data.push({{$rtEvent->eventWargaCountTidakIkut}})

      var barChartCanvasEvent = $('#eventbarChart{{$rtEvent->category_id}}').get(0).getContext('2d')
      var barChartData = jQuery.extend(true, {}, areaChartDataEvent)
      var temp0 = areaChartDataEvent.datasets[0]
      var temp1 = areaChartDataEvent.datasets[1]

      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0


      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }


      var barChart = new Chart(barChartCanvasEvent, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })


      @endif
      @endforeach

      @endforeach

      var barChartCanvas = $('#rtbarChart{{$rtArray[0]->rw_id}}').get(0).getContext('2d')
      var barChartData = jQuery.extend(true, {}, areaChartData1)
      var temp0 = areaChartData1.datasets[0]
      var temp1 = areaChartData1.datasets[1]
      var temp2 = areaChartData1.datasets[2]
      var temp3 = areaChartData1.datasets[3]

      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0
      barChartData.datasets[2] = temp2
      barChartData.datasets[3] = temp3


      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }


      var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })


      @endif


      @if(count($rwArray) > 0)

//-------------
//- BAR CHART -
//-------------

var areaChartData1 = {
  labels: [],
  datasets: [{
      label: 'Warga Berdomisili',
      backgroundColor: '#f56954',
      borderColor: 'rgba(60,141,188,0.8)',
      pointRadius: false,
      pointColor: '#3b8bba',
      pointStrokeColor: 'rgba(60,141,188,1)',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data: []
    },
    {
      label: 'Warga Bukan Berdomisili',
      backgroundColor: '#00a65a',
      borderColor: 'rgba(210, 214, 222, 1)',
      pointRadius: false,
      pointColor: 'rgba(210, 214, 222, 1)',
      pointStrokeColor: '#c1c7d1',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data: []
    },
    {label: 'Laki-Laki ',
      backgroundColor: '#00c0ef',
      borderColor: 'rgba(60,141,188,0.8)',
      pointRadius: false,
      pointColor: '#3b8bba',
      pointStrokeColor: 'rgba(60,141,188,1)',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data: []
    },
    {label: 'Perempuan',
      backgroundColor: '#f39c12',
      borderColor: 'rgba(60,141,188,0.8)',
      pointRadius: false,
      pointColor: '#3b8bba',
      pointStrokeColor: 'rgba(60,141,188,1)',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data: []
    },
  ]
}

@foreach($rwArray as $index => $rwObj)
@if($rwObj->wargaBerdomisiliCount > 0 ||
      $rwObj->wargaNonBerdomisiliCount > 0 ||
      $rwObj->lakiLakiCount > 0 ||
      $rwObj->perempuanCount > 0)

      areaChartData1.labels.push('{{$rwObj->rw_name}}')
      areaChartData1.datasets[0].data.push({{$rwObj->wargaBerdomisiliCount}})
      areaChartData1.datasets[1].data.push({{$rwObj->wargaNonBerdomisiliCount}})
      areaChartData1.datasets[2].data.push({{$rwObj->lakiLakiCount}})
      areaChartData1.datasets[3].data.push({{$rwObj->perempuanCount}})

@endif

@foreach($rwObj->eventCategorys as $rtEvent)
      @if($rtEvent->eventWargaCountikut != 0 || $rtEvent->eventWargaCountTidakIkut != 0)
      var areaChartDataEvent = {
        labels: [],
        datasets: [{
            label: 'Warga Ikut',
            backgroundColor: '#f56954',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: []
          },
          {
            label: 'Warga Tidak Ikut',
            backgroundColor: '#00a65a',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: []
          },
        ]
      }
      areaChartDataEvent.labels.push('{{$rwObj->rw_name}}')
      areaChartDataEvent.datasets[0].data.push({{$rtEvent->eventWargaCountikut}})
      areaChartDataEvent.datasets[1].data.push({{$rtEvent->eventWargaCountTidakIkut}})

      var barChartCanvasEvent = $('#eventbarChart{{$rtEvent->category_id}}').get(0).getContext('2d')
      var barChartData = jQuery.extend(true, {}, areaChartDataEvent)
      var temp0 = areaChartDataEvent.datasets[0]
      var temp1 = areaChartDataEvent.datasets[1]

      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0


      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }


      var barChart = new Chart(barChartCanvasEvent, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })


      @endif
      @endforeach


@endforeach

      var barChartCanvas = $('#rwbarChart{{$rwArray[0]->kel_id}}').get(0).getContext('2d')
      var barChartData = jQuery.extend(true, {}, areaChartData1)
      var temp0 = areaChartData1.datasets[0]
      var temp1 = areaChartData1.datasets[1]
      var temp2 = areaChartData1.datasets[2]
      var temp3 = areaChartData1.datasets[3]

      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0
      barChartData.datasets[2] = temp2
      barChartData.datasets[3] = temp3


      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }


      var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })


      @endif



      //---------------------
      //- STACKED BAR CHART -
      //---------------------
      var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
      var stackedBarChartData = jQuery.extend(true, {}, barChartData)

      var stackedBarChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          xAxes: [{
            stacked: true,
          }],
          yAxes: [{
            stacked: true
          }]
        }
      }

      var stackedBarChart = new Chart(stackedBarChartCanvas, {
        type: 'bar',
        data: stackedBarChartData,
        options: stackedBarChartOptions
      })
    })
  </script>

  @yield('scripts')
</body>

</html>

