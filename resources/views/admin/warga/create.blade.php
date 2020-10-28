<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ trans('global.site_title') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route("admin.index") }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="../../dist/img/Logo1b.png" alt="AdminLTE Logo" width="200" height="60" style="opacity: .8">
        <!-- <span class="brand-text font-weight-light">SIDAK CMS</span> -->
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{$userLogin}}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v1</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index2.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v2</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index3.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v3</p>
                  </a>
                </li>
              </ul>
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
                <li class="nav-item">
                  <a href="pages/charts/flot.html" class="nav-link">
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
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
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
              <h1>List Warga</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route("admin.index") }}">Home</a></li>
                <li class="breadcrumb-item active">List Warga</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <!-- /.card -->
              @section('content')
              <div class="card">

                <!-- /.card-header -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Create Warga</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card-body">
                    <form action="{{ route("admin.warga.store") }}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group {{ $errors->has('warga_no_ktp') ? 'has-error' : '' }}">
                        <label for="warga_no_ktp">{{ trans('global.warga.fields.warga_no_ktp') }}*</label>
                        <input type="number" id="warga_no_ktp" name="warga_no_ktp" class="form-control" value="{{ old('warga_no_ktp', isset($warga) ? $warga->warga_no_ktp : '') }}">
                        @if($errors->has('warga_no_ktp'))
                        <em class="invalid-feedback">
                          {{ $errors->first('warga_no_ktp') }}
                        </em>
                        @endif
                        <p class="helper-block">
                          {{ trans('global.warga.fields.warga_no_ktp_helper') }}
                        </p>
                      </div>

                      <div class="form-group {{ $errors->has('warga_no_kk') ? 'has-error' : '' }}">
                        <label for="warga_no_kk">{{ trans('global.warga.fields.warga_no_kk') }}*</label>
                        <input type="number" id="warga_no_kk" name="warga_no_kk" class="form-control" value="{{ old('warga_no_kk', isset($warga) ? $warga->warga_no_kk : '') }}" required>
                        @if($errors->has('warga_no_kk'))
                        <em class="invalid-feedback">
                          {{ $errors->first('warga_no_kk') }}
                        </em>
                        @endif
                        <p class="helper-block">
                          {{ trans('global.warga.fields.warga_no_kk_helper') }}
                        </p>
                      </div>

                      <div class="form-group {{ $errors->has('warga_first_name') ? 'has-error' : '' }}">
                        <label for="warga_first_name">{{ trans('global.warga.fields.warga_first_name') }}*</label>
                        <input type="text" id="warga_first_name" name="warga_first_name" class="form-control" value="{{ old('warga_first_name', isset($warga) ? $warga->warga_first_name : '') }}" required>
                        @if($errors->has('warga_first_name'))
                        <em class="invalid-feedback">
                          {{ $errors->first('warga_first_name') }}
                        </em>
                        @endif
                        <p class="helper-block">
                          {{ trans('global.warga.fields.warga_first_name_helper') }}
                        </p>
                      </div>

                      <div class="form-group {{ $errors->has('warga_last_name') ? 'has-error' : '' }}">
                        <label for="warga_last_name">{{ trans('global.warga.fields.warga_last_name') }}*</label>
                        <input type="text" id="warga_last_name" name="warga_last_name" class="form-control" value="{{ old('warga_last_name', isset($warga) ? $warga->warga_last_name : '') }}" required>
                        @if($errors->has('warga_last_name'))
                        <em class="invalid-feedback">
                          {{ $errors->first('warga_last_name') }}
                        </em>
                        @endif
                        <p class="helper-block">
                          {{ trans('global.warga.fields.warga_last_name_helper') }}
                        </p>
                      </div>

                      <div class="form-group {{ $errors->has('warga_sex') ? 'has-error' : '' }}">
                        <label for="warga_sex">{{ trans('global.warga.fields.warga_sex') }}*</label><br>
                        <input type="radio" id="warga_sex" name="warga_sex" value="1">
                        <label for="male">Male</label><br>
                        <input type="radio" id="warga_sex" name="warga_sex" value="2">
                        <label for="female">Female</label><br>
                      </div>

                      <div class="form-group {{ $errors->has('warga_religion') ? 'has-error' : '' }}">
                        <label for="warga_religion">{{ trans('global.warga.fields.warga_religion') }}*
                          <select name="warga_religion" id="warga_religion" class="form-control select2" required>
                            @foreach($religions as $id => $religion)
                            <option value="{{ $id }}" {{ (in_array($id, old('warga_religion', [])) || isset($warga) && $warga->warga_religion->contains($id)) ? 'selected' : '' }}>
                              {{ $religion }}
                            </option>
                            @endforeach
                          </select>
                          @if($errors->has('religion'))
                          <em class="invalid-feedback">
                            {{ $errors->first('religion') }}
                          </em>
                          @endif
                          <p class="helper-block">
                            {{ trans('global.warga.fields.warga_religion_helper') }}
                          </p>
                      </div>

                      <div class="form-group {{ $errors->has('warga_address') ? 'has-error' : '' }}">
                        <label for="warga_address">{{ trans('global.warga.fields.warga_address') }}*</label>
                        <input type="text" id="warga_address" name="warga_address" class="form-control" value="{{ old('warga_address', isset($warga) ? $warga->warga_address : '') }}" required>
                        @if($errors->has('warga_address'))
                        <em class="invalid-feedback">
                          {{ $errors->first('warga_address') }}
                        </em>
                        @endif
                        <p class="helper-block">
                          {{ trans('global.warga.fields.warga_address_helper') }}
                        </p>
                      </div>



                      <div class="form-group {{ $errors->has('warga_address_code') ? 'has-error' : '' }}">
                        <label for="warga_address_code">{{ trans('global.warga.fields.warga_address_code') }}*
                          <select name="warga_address_code" id="warga_address_code" class="form-control select2" required>
                            @foreach($master_alamats as $id => $master_alamat)
                            <option value="{{ $master_alamat->id }}" {{ (in_array($id, old('warga_address_code', [])) || isset($warga) && $warga->warga_address_code->contains($id)) ? 'selected' : '' }}>
                              {{ $master_alamat->address_code_name . ' ' . $master_alamat->address_code_blok}}
                            </option>
                            @endforeach
                          </select>
                          @if($errors->has('master_alamat'))
                          <em class="invalid-feedback">
                            {{ $errors->first('master_alamat') }}
                          </em>
                          @endif
                          <p class="helper-block">
                            {{ trans('global.warga.fields.warga_address_code_helper') }}
                          </p>
                      </div>

                      <div class="form-group {{ $errors->has('warga_job') ? 'has-error' : '' }}">
                        <label for="warga_job">{{ trans('global.warga.fields.warga_job') }}*
                          <select name="warga_job" id="warga_job" class="form-control select2" required>
                            @foreach($jobs as $id => $job)
                            <option value="{{ $id }}" {{ (in_array($id, old('warga_job', [])) || isset($warga) && $warga->warga_job->contains($id)) ? 'selected' : '' }}>
                              {{ $job }}
                            </option>
                            @endforeach
                          </select>
                          @if($errors->has('job'))
                          <em class="invalid-feedback">
                            {{ $errors->first('job') }}
                          </em>
                          @endif
                          <p class="helper-block">
                            {{ trans('global.warga.fields.warga_job_helper') }}
                          </p>
                      </div>

                      <div class="form-group {{ $errors->has('warga_salary_range') ? 'has-error' : '' }}">
                        <label for="warga_salary_range">{{ trans('global.warga.fields.warga_salary_range') }}*
                          <select name="warga_salary_range" id="warga_salary_range" class="form-control select2" required>
                            @foreach($warga_salary_range as $address_code_id => $warga_salary_range)
                            <option value="{{ $warga_salary_range->id }}" {{ (in_array($address_code_id, old('keuangan_warga_id', [])) || isset($keuangan) && $keuangan->keuangan_warga_id->contains($address_code_id)) ? 'selected' : '' }}>
                              {{ $warga_salary_range->salary_start . ' - '. $warga_salary_range->salary_end}}
                            </option>
                            @endforeach
                          </select>
                          @if($errors->has('warga_salary_range'))
                          <em class="invalid-feedback">
                            {{ $errors->first('warga_salary_range') }}
                          </em>
                          @endif
                          <p class="helper-block">
                            {{ trans('global.warga.fields.warga_salary_range_helper') }}
                          </p>
                      </div>

                      <div class="form-group {{ $errors->has('warga_phone') ? 'has-error' : '' }}">
                        <label for="warga_phone">{{ trans('global.warga.fields.warga_phone') }}*</label>
                        <input type="number" id="warga_phone" name="warga_phone" class="form-control" value="{{ old('warga_phone', isset($warga) ? $warga->warga_phone : '') }}">
                        @if($errors->has('warga_phone'))
                        <em class="invalid-feedback">
                          {{ $errors->first('warga_phone') }}
                        </em>
                        @endif
                        <p class="helper-block">
                          {{ trans('global.warga.fields.warga_phone_helper') }}
                        </p>
                      </div>

                      <div class="form-group {{ $errors->has('warga_email') ? 'has-error' : '' }}">
                        <label for="warga_email">{{ trans('global.warga.fields.warga_email') }}*</label>
                        <input type="email" id="warga_email" name="warga_email" class="form-control" value="{{ old('warga_email', isset($warga) ? $warga->warga_email : '') }}">
                        @if($errors->has('warga_email'))
                        <em class="invalid-feedback">
                          {{ $errors->first('warga_email') }}
                        </em>
                        @endif
                        <p class="helper-block">
                          {{ trans('global.warga.fields.warga_email_helper') }}
                        </p>
                      </div>

                      <div class="form-group {{ $errors->has('warga_birth_date') ? 'has-error' : '' }}">
                        <label for="warga_birth_date">{{ trans('global.warga.fields.warga_birth_date') }}*</label>
                        <input type="date" id="warga_birth_date" name="warga_birth_date" class="form-control" value="{{ old('warga_birth_date', isset($warga) ? $warga->warga_birth_date : '') }}" required>
                        @if($errors->has('warga_birth_date'))
                        <em class="invalid-feedback">
                          {{ $errors->first('warga_birth_date') }}
                        </em>
                        @endif
                        <p class="helper-block">
                          {{ trans('global.warga.fields.warga_birth_date_helper') }}
                        </p>
                      </div>



                      <div class="form-group {{ $errors->has('warga_is_ktp_sama_domisili') ? 'has-error' : '' }}">
                        <label for="warga_is_ktp_sama_domisili">{{ trans('global.warga.fields.warga_is_ktp_sama_domisili') }}*</label><br>
                        <input type="radio" id="warga_is_ktp_sama_domisili" name="warga_is_ktp_sama_domisili" value="1">
                        <label for="ya">Ya</label><br>
                        <input type="radio" id="warga_is_ktp_sama_domisili" name="warga_is_ktp_sama_domisili" value="2">
                        <label for="tidak">Tidak</label><br>

                      </div>

                      <div class="form-group {{ $errors->has('warga_join_date') ? 'has-error' : '' }}">
                        <label for="warga_join_date">{{ trans('global.warga.fields.warga_join_date') }}*</label>
                        <input type="date" id="warga_join_date" name="warga_join_date" class="form-control" value="{{ old('warga_join_date', isset($warga) ? $warga->warga_join_date : '') }}" required>
                        @if($errors->has('warga_join_date'))
                        <em class="invalid-feedback">
                          {{ $errors->first('warga_join_date') }}
                        </em>
                        @endif
                        <p class="helper-block">
                          {{ trans('global.warga.fields.warga_join_date_helper') }}
                        </p>
                      </div>



                      <div class="form-group {{ $errors->has('warga_pendidikan') ? 'has-error' : '' }}">
                        <label for="warga_pendidikan">{{ trans('global.warga.fields.warga_pendidikan') }}*
                          <select name="warga_pendidikan" id="warga_pendidikan" class="form-control select2" required>
                            @foreach($pendidikans as $id => $pendidikan)
                            <option value="{{ $id }}" {{ (in_array($id, old('warga_pendidikan', [])) || isset($warga) && $warga->warga_pendidikan->contains($id)) ? 'selected' : '' }}>
                              {{ $pendidikan }}
                            </option>
                            @endforeach
                          </select>
                          @if($errors->has('pendidikan'))
                          <em class="invalid-feedback">
                            {{ $errors->first('pendidikan') }}
                          </em>
                          @endif
                          <p class="helper-block">
                            {{ trans('global.warga.fields.warga_pendidikan_helper') }}
                          </p>
                      </div>


                      <div class="form-group {{ $errors->has('warga_rt') ? 'has-error' : '' }}">
                        <label for="warga_rt">{{ trans('global.warga.fields.warga_rt') }}*
                          <select name="warga_rt" id="warga_rt" class="form-control select2" required>
                            @foreach($rts as $id => $rt)
                            <option value="{{ $id }}" {{ (in_array($id, old('warga_rt', [])) || isset($warga) && $warga->warga_rt->contains($id)) ? 'selected' : '' }}>
                              {{ $rt }}
                            </option>
                            @endforeach
                          </select>
                          @if($errors->has('rt'))
                          <em class="invalid-feedback">
                            {{ $errors->first('rt') }}
                          </em>
                          @endif
                          <p class="helper-block">
                            {{ trans('global.warga.fields.warga_rt_helper') }}
                          </p>
                      </div>

                      <div class="form-group {{ $errors->has('warga_status') ? 'has-error' : '' }}">
                        <label for="warga_status">{{ trans('global.warga.fields.warga_status') }}*</label><br>
                        <input type="radio" id="warga_status" name="warga_status" value="1">
                        <label for="male">Aktif</label><br>
                        <input type="radio" id="warga_status" name="warga_status" value="2">
                        <label for="female">Tidak Aktif</label><br>
                        <input type="radio" id="warga_status" name="warga_status" value="0">
                        <label for="female">Pending</label><br>
                      </div>

                      <div>
                        <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                      </div>
                    </form>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.5
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>