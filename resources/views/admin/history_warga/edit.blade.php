<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ trans('global.site_title') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
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
                <img src="{{ asset('dist/img/Logo1b.png')}}" alt="AdminLTE Logo" width="200" height="60" style="opacity: .8">
                <!-- <span class="brand-text font-weight-light">SIDAK CMS</span> -->
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
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
                        <li class="nav-item">
                            <a href="{{ route("admin.index") }}" class="nav-link">
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
                        <li class="nav-item">
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
                        <li class="nav-item active">
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
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Reports
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route("admin.report_data_masyarakat_km.index") . '?report_keuangan' }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Report Keuangan</p>
                                    </a>
                                <li class="nav-item">
                                    <a href="{{ route("admin.report_data_masyarakat_km.index") . '?report_event' }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Report Event</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
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
                            <h1>List Histori Warga</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route("admin.index") }}">Home</a></li>
                                <li class="breadcrumb-item active">List Histori Warga</li>
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
                                        <h3 class="card-title">Edit Histori Warga</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body">
                                        <form id="historyW" action="{{ route("admin.history_warga.update", [$history_warga->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group {{ $errors->has('history_desc') ? 'has-error' : '' }}">
                                                <label for="history_desc">{{ trans('global.history_warga.fields.history_desc') }}*</label>
                                                <input type="text" id="history_desc" name="history_desc" class="form-control" value="{{ old('history_desc', isset($history_warga) ? $history_warga->history_desc : '') }}">
                                                @if($errors->has('history_desc'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('history_desc') }}
                                                </em>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('global.history_warga.fields.history_desc_helper') }}
                                                </p>
                                            </div>
                                            <div class="form-group {{ $errors->has('history_date') ? 'has-error' : '' }}">
                                                <label for="history_date">{{ trans('global.history_warga.fields.history_date') }}*</label>
                                                <input type="date" id="history_date" name="history_date" class="form-control" value="{{ old('history_date', isset($history_warga) ? date('Y-m-d', strtotime($history_warga->history_date)) : '') }}">
                                                @if($errors->has('history_date'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('history_date') }}
                                                </em>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('global.history_warga.fields.history_date_helper') }}
                                                </p>
                                            </div>

                                            <div class="form-group {{ $errors->has('history_category') ? 'has-error' : '' }}">
                                                <label for="history_category">{{ trans('global.history_warga.fields.history_category') }}*
                                                    <select name="history_category" id="history_category" class="form-control select2" onclick="addElementPindah()">
                                                        @foreach($history_category as $id => $history_category)
                                                        <option value="{{ $id }}" {{ (isset($history_warga) && $history_warga->history_category == $id) ? 'selected' : '' }}>
                                                            {{ $history_category }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('history_category'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('history_category') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.history_warga.fields.history_category_helper') }}
                                                    </p>
                                            </div>

                                            <div class="form-group {{ $errors->has('warga_id') ? 'has-error' : '' }}">
                                                <label for="warga_id">{{ trans('global.history_warga.fields.warga_id') }}*
                                                    <select name="warga_id" id="warga_id" class="form-control select2">
                                                        @foreach($warga_ids as $id => $warga_ids)
                                                        <option value="{{ $warga_ids->id }}" {{ (isset($history_warga) && $history_warga->warga_id == $warga_ids->id) ? 'selected' : '' }}>
                                                            {{ $warga_ids->warga_first_name . " " . $warga_ids->warga_last_name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('warga_id'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('warga_id') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.history_warga.fields.warga_id_helper') }}
                                                    </p>
                                            </div>

                                            @if($history_warga->history_category == 1)
                                            <div name="pindah" class="form-group {{ $errors->has('provinsi_id') ? 'has-error' : '' }}">
                                                <label for="provinsi_id">{{ trans('global.history_warga.fields.provinsi_id') }}*
                                                    <select name="provinsi_id" id="provinsi_id" class="form-control select2" onChange="filterKota(this.value)" onclick="filterKota(this.value)">
                                                        @foreach($provinsi_id1 as $id => $provinsi_id1)
                                                        <option value="{{ $id }}" {{ (isset($history_warga) && $history_warga->provinsi_id == $id) ? 'selected' : '' }}>
                                                            {{ $provinsi_id1 }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('provinsi_id'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('provinsi_id') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.history_warga.fields.provinsi_id_helper') }}
                                                    </p>
                                            </div>

                                            <div name="pindah" class="form-group {{ $errors->has('kota_id') ? 'has-error' : '' }}">
                                                <label for="kota_id">{{ trans('global.history_warga.fields.kota_id') }}*
                                                    <select name="kota_id" id="kota_id" class="form-control select2" onChange="filterKecamatan(this.value)" onclick="filterKecamatan(this.value)">
                                                        @foreach($kota_id1 as $id => $kota_id1)
                                                        <option value="{{ $kota_id1->id }}" id="{{$kota_id1->province_id}}" {{ (isset($history_warga) && $history_warga->kota_id == $kota_id1->id) ? 'selected' : '' }}>
                                                            {{ $kota_id1->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('kota_id'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('kota_id') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.history_warga.fields.kota_id_helper') }}
                                                    </p>
                                            </div>

                                            <div name="pindah" class="form-group {{ $errors->has('kecamatan_id') ? 'has-error' : '' }}">
                                                <label for="kecamatan_id">{{ trans('global.history_warga.fields.kecamatan_id') }}*
                                                    <select name="kecamatan_id" id="kecamatan_id" class="form-control select2" onChange="filterKelurahan(this.value)" onclick="filterKelurahan(this.value)">
                                                        @foreach($kecamatan_id1 as $id => $kecamatan_id1)
                                                        <option value="{{ $kecamatan_id1->id }}" id="{{$kecamatan_id1->kec_kota_id}}" {{ (isset($history_warga) && $history_warga->kecamatan_id == $kecamatan_id1->id) ? 'selected' : '' }}>
                                                            {{ $kecamatan_id1->kec_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('kecamatan_id'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('kecamatan_id') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.history_warga.fields.kecamatan_id_helper') }}
                                                    </p>
                                            </div>

                                            <div name="pindah" class="form-group {{ $errors->has('kelurahan_id') ? 'has-error' : '' }}">
                                                <label for="kelurahan_id">{{ trans('global.history_warga.fields.kelurahan_id') }}*
                                                    <select name="kelurahan_id" id="kelurahan_id" class="form-control select2" onChange="filterRW(this.value)" onclick="filterRW(this.value)">
                                                        @foreach($kelurahan_id1 as $id => $kelurahan_id1)
                                                        <option value="{{ $kelurahan_id1->id }}" id="{{$kelurahan_id1->kel_kec_id}}" {{ (isset($history_warga) && $history_warga->kelurahan_id == $kelurahan_id1->id) ? 'selected' : '' }}>
                                                            {{ $kelurahan_id1->kel_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('kelurahan_id'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('kelurahan_id') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.history_warga.fields.kelurahan_id_helper') }}
                                                    </p>
                                            </div>

                                            <div name="pindah" class="form-group {{ $errors->has('rw_id') ? 'has-error' : '' }}">
                                                <label for="rw_id">{{ trans('global.history_warga.fields.rw_id') }}*
                                                    <select name="rw_id" id="rw_id" class="form-control select2" onChange="filterRT(this.value)" onclick="filterRT(this.value)">
                                                        @foreach($rw_id1 as $id => $rw_id1)
                                                        <option value="{{ $rw_id1->id }}" id="{{$rw_id1->rw_kel_id}}" {{ (isset($history_warga) && $history_warga->rw_id == $rw_id1->id) ? 'selected' : '' }}>
                                                            {{ $rw_id1->rw_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('rw_id'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('rw_id') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.history_warga.fields.rw_id_helper') }}
                                                    </p>
                                            </div>

                                            <div name="pindah" class="form-group {{ $errors->has('rt_id') ? 'has-error' : '' }}">
                                                <label for="rt_id">{{ trans('global.history_warga.fields.rt_id') }}*
                                                    <select name="rt_id" id="rt_id" class="form-control select2">
                                                        @foreach($rt_id1 as $id => $rt_id1)
                                                        <option value="{{ $rt_id1->id }}" id="{{$rt_id1->rt_rw_id}}" {{ (isset($history_warga) && $history_warga->rt_id == $rw_id1->id) ? 'selected' : '' }}>
                                                            {{ $rt_id1->rt_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('rt_id'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('rt_id') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.history_warga.fields.rt_id_helper') }}
                                                    </p>
                                            </div>

                                            @endif
                                            <input type="text" id="id_rt" name="id_rt" class="form-control" value="{{$rts}}" hidden>
                                            <div id="save">
                                                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                                            </div>
                                        </form>
                                    </div>
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
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js')}}"></script>
    <!-- page script -->
    <script>
        function addElementPindah() {
            var historyCategory = document.getElementById('history_category').value;
            if (historyCategory == "1") {
                for (i = 0; i < document.getElementsByName('pindah').length; i++) {
                    document.getElementsByName('pindah')[i].remove();
                }
                for (i = 0; i < document.getElementsByName('pindah').length; i++) {
                    document.getElementsByName('pindah')[i].remove();
                }
                for (i = 0; i < document.getElementsByName('pindah').length; i++) {
                    document.getElementsByName('pindah')[i].remove();
                }
                var save = document.getElementById('save').remove();
                var html = `<div name="pindah" class="form-group {{ $errors->has('provinsi_id') ? 'has-error' : '' }}">
                                                <label for="provinsi_id">{{ trans('global.history_warga.fields.provinsi_id') }}*
                                                    <select name="provinsi_id" id="provinsi_id" class="form-control select2" onChange="filterKota(this.value)" onclick="filterKota(this.value)">
                                                        @foreach($provinsi_id as $id => $provinsi_id)
                                                        <option value="{{ $id }}" {{ (isset($history_warga) && $history_warga->provinsi_id == $id) ? 'selected' : '' }}>
                                                            {{ $provinsi_id }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('provinsi_id'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('provinsi_id') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.history_warga.fields.provinsi_id_helper') }}
                                                    </p>
                                            </div>

                                            <div name="pindah" class="form-group {{ $errors->has('kota_id') ? 'has-error' : '' }}">
                                                <label for="kota_id">{{ trans('global.history_warga.fields.kota_id') }}*
                                                    <select name="kota_id" id="kota_id" class="form-control select2" onChange="filterKecamatan(this.value)" onclick="filterKecamatan(this.value)">
                                                        @foreach($kota_id as $id => $kota_id)
                                                        <option value="{{ $kota_id->id }}" id="{{$kota_id->province_id}}" {{ (isset($history_warga) && $history_warga->kota_id == $kota_id->id) ? 'selected' : '' }}>
                                                            {{ $kota_id->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('kota_id'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('kota_id') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.history_warga.fields.kota_id_helper') }}
                                                    </p>
                                            </div>

                                            <div name="pindah" class="form-group {{ $errors->has('kecamatan_id') ? 'has-error' : '' }}">
                                                <label for="kecamatan_id">{{ trans('global.history_warga.fields.kecamatan_id') }}*
                                                    <select name="kecamatan_id" id="kecamatan_id" class="form-control select2" onChange="filterKelurahan(this.value)" onclick="filterKelurahan(this.value)">
                                                        @foreach($kecamatan_id as $id => $kecamatan_id)
                                                        <option value="{{ $kecamatan_id->id }}" id="{{$kecamatan_id->kec_kota_id}}" {{ (isset($history_warga) && $history_warga->kecamatan_id == $kecamatan_id->id) ? 'selected' : '' }}>
                                                            {{ $kecamatan_id->kec_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('kecamatan_id'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('kecamatan_id') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.history_warga.fields.kecamatan_id_helper') }}
                                                    </p>
                                            </div>

                                            <div name="pindah" class="form-group {{ $errors->has('kelurahan_id') ? 'has-error' : '' }}">
                                                <label for="kelurahan_id">{{ trans('global.history_warga.fields.kelurahan_id') }}*
                                                    <select name="kelurahan_id" id="kelurahan_id" class="form-control select2" onChange="filterRW(this.value)" onclick="filterRW(this.value)">
                                                        @foreach($kelurahan_id as $id => $kelurahan_id)
                                                        <option value="{{ $kelurahan_id->id }}" id="{{$kelurahan_id->kel_kec_id}}"  {{ (isset($history_warga) && $history_warga->kelurahan_id == $kelurahan_id->id) ? 'selected' : '' }}>
                                                            {{ $kelurahan_id->kel_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('kelurahan_id'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('kelurahan_id') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.history_warga.fields.kelurahan_id_helper') }}
                                                    </p>
                                            </div>

                                            <div name="pindah" class="form-group {{ $errors->has('rw_id') ? 'has-error' : '' }}">
                                                <label for="rw_id">{{ trans('global.history_warga.fields.rw_id') }}*
                                                    <select name="rw_id" id="rw_id" class="form-control select2" onChange="filterRT(this.value)" onclick="filterRT(this.value)">
                                                        @foreach($rw_id as $id => $rw_id)
                                                        <option value="{{ $rw_id->id }}" id="{{$rw_id->rw_kel_id}}" {{ (isset($history_warga) && $history_warga->rw_id == $rw_id->id) ? 'selected' : '' }}>
                                                            {{ $rw_id->rw_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('rw_id'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('rw_id') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.history_warga.fields.rw_id_helper') }}
                                                    </p>
                                            </div>

                                            <div name="pindah" class="form-group {{ $errors->has('rt_id') ? 'has-error' : '' }}">
                                                <label for="rt_id">{{ trans('global.history_warga.fields.rt_id') }}*
                                                    <select name="rt_id" id="rt_id" class="form-control select2">
                                                        @foreach($rt_id as $id => $rt_id)
                                                        <option value="{{ $rt_id->id }}" id="{{$rt_id->rt_rw_id}}" {{ (isset($history_warga) && $history_warga->rt_id == $rt_id->id) ? 'selected' : '' }}>
                                                            {{ $rt_id->rt_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('rt_id'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('rt_id') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.history_warga.fields.rt_id_helper') }}
                                                    </p>
                                            </div>
                                            
                                            <div id="save">
                                                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                                            </div>`;


                var newElement = document.createElement("p");
                newElement.innerHTML = html;
                document.getElementById('historyW').appendChild(newElement);

            } else {
                for (i = 0; i < document.getElementsByName('pindah').length; i++) {
                    document.getElementsByName('pindah')[i].remove();
                }
                for (i = 0; i < document.getElementsByName('pindah').length; i++) {
                    document.getElementsByName('pindah')[i].remove();
                }
                for (i = 0; i < document.getElementsByName('pindah').length; i++) {
                    document.getElementsByName('pindah')[i].remove();
                }
            }
            // document.body.appendChild(newElement);
            // addElement('files', 'p', 'file-' + fileId, html);
        }

        //filter Kota dropdown
        var listKota = [];

        function filterKota(provinceId) {
            if (listKota.length == 0) {
                Array.from(document.querySelector("#kota_id").options).
                forEach(function(option_element) {
                    let option_text = option_element.text;
                    let option_value = option_element.value;
                    let province_id = option_element.id;
                    let is_option_selected = option_element.selected;

                    console.log('value : ' + provinceId);
                    console.log('Option Text : ' + option_text);
                    console.log('Option Value : ' + option_value);
                    console.log('Option prvince id : ' + province_id);
                    console.log('Option Selected : ' + (is_option_selected === true ? 'Yes' : 'No'));

                    console.log("\n\r");
                    var kota = {
                        id: option_value,
                        name: option_text,
                        province_id: province_id
                    };

                    listKota.push(kota);

                });

                AddOptionKota(provinceId)
            } else {

                AddOptionKota(provinceId)
            }

        }

        function AddOptionKota(provinceId) {
            var select = document.getElementById("kota_id");
            var length = select.options.length;
            for (i = length - 1; i >= 0; i--) {
                select.options[i] = null;
            }

            listKota.forEach(function(kota) {
                if (kota.province_id == provinceId) {
                    var option = document.createElement("option");
                    option.text = kota.name;
                    option.id = kota.province_id;
                    option.value = kota.id;
                    select.add(option);
                    console.log(select)
                }
            });

            var length2 = select.options.length;
            if (length2 > 0) {
                for (i = length2 - 1; i >= 0; i--) {
                    if (select.options[i].selected === true) {
                        filterKecamatan(select.options[i].value)
                    }
                }
            } else {
                filterKecamatan(0)
            }


        }

        //filter kecamatan dropdown
        var listKecamatan = [];

        function filterKecamatan(kotaId) {
            if (listKecamatan.length == 0) {
                Array.from(document.querySelector("#kecamatan_id").options).
                forEach(function(option_element) {
                    let option_text = option_element.text;
                    let option_value = option_element.value;
                    let kota_id = option_element.id;
                    let is_option_selected = option_element.selected;

                    console.log('value : ' + kotaId);
                    console.log('Option Text : ' + option_text);
                    console.log('Option Value : ' + option_value);
                    console.log('Option kota_id : ' + kota_id);
                    console.log('Option Selected : ' + (is_option_selected === true ? 'Yes' : 'No'));

                    console.log("\n\r");
                    var kecamatan = {
                        id: option_value,
                        name: option_text,
                        kota_id: kota_id
                    };

                    listKecamatan.push(kecamatan);

                });

                AddOptionKecamatan(kotaId)
            } else {

                AddOptionKecamatan(kotaId)
            }

        }

        function AddOptionKecamatan(kotaId) {
            var select = document.getElementById("kecamatan_id");
            var length = select.options.length;
            for (i = length - 1; i >= 0; i--) {
                select.options[i] = null;
            }

            listKecamatan.forEach(function(kecamatan) {
                if (kecamatan.kota_id == kotaId) {
                    var option = document.createElement("option");
                    option.text = kecamatan.name;
                    option.id = kecamatan.kota_id;
                    option.value = kecamatan.id;
                    select.add(option);

                }
            });

            var length2 = select.options.length;
            if (length2 > 0) {
                for (i = length2 - 1; i >= 0; i--) {
                    if (select.options[i].selected === true) {
                        filterKelurahan(select.options[i].value)
                    }
                }

            } else {
                filterKelurahan(0)
            }
        }

        //filter Kelurahan dropdown
        var listKelurahan = [];

        function filterKelurahan(kecamatanId) {
            if (listKelurahan.length == 0) {
                Array.from(document.querySelector("#kelurahan_id").options).
                forEach(function(option_element) {
                    let option_text = option_element.text;
                    let option_value = option_element.value;
                    let kecamatan_id = option_element.id;
                    let is_option_selected = option_element.selected;

                    console.log('value : ' + kecamatanId);
                    console.log('Option Text : ' + option_text);
                    console.log('Option Value : ' + option_value);
                    console.log('Option kecamatan_id : ' + kecamatan_id);
                    console.log('Option Selected : ' + (is_option_selected === true ? 'Yes' : 'No'));

                    console.log("\n\r");
                    var kelurahan = {
                        id: option_value,
                        name: option_text,
                        kecamatan_id: kecamatan_id
                    };

                    listKelurahan.push(kelurahan);

                });

                AddOptionKelurahan(kecamatanId)
            } else {

                AddOptionKelurahan(kecamatanId)
            }

        }

        function AddOptionKelurahan(kecamatanId) {
            var select = document.getElementById("kelurahan_id");
            var length = select.options.length;
            for (i = length - 1; i >= 0; i--) {
                select.options[i] = null;
            }

            listKelurahan.forEach(function(kelurahan) {
                if (kelurahan.kecamatan_id == kecamatanId) {
                    var option = document.createElement("option");
                    option.text = kelurahan.name;
                    option.id = kelurahan.kecamatan_id;
                    option.value = kelurahan.id;
                    select.add(option);

                }
            });

            var length2 = select.options.length;

            if (length2 > 0) {
                for (i = length2 - 1; i >= 0; i--) {
                    if (select.options[i].selected === true) {
                        filterRW(select.options[i].value)
                    }
                }

            } else {
                filterRW(0)
            }
        }

        //filter rw dropdown
        var listRW = [];

        function filterRW(KelurahanId) {
            if (listRW.length == 0) {
                Array.from(document.querySelector("#rw_id").options).
                forEach(function(option_element) {
                    let option_text = option_element.text;
                    let option_value = option_element.value;
                    let kelurahan_id = option_element.id;
                    let is_option_selected = option_element.selected;

                    console.log('value : ' + KelurahanId);
                    console.log('Option Text : ' + option_text);
                    console.log('Option Value : ' + option_value);
                    console.log('Option kelurahan_id : ' + kelurahan_id);
                    console.log('Option Selected : ' + (is_option_selected === true ? 'Yes' : 'No'));

                    console.log("\n\r");
                    var rw = {
                        id: option_value,
                        name: option_text,
                        kelurahan_id: kelurahan_id
                    };

                    listRW.push(rw);

                });

                AddOptionRW(KelurahanId)
            } else {

                AddOptionRW(KelurahanId)
            }

        }

        function AddOptionRW(KelurahanId) {
            var select = document.getElementById("rw_id");
            var length = select.options.length;
            for (i = length - 1; i >= 0; i--) {
                select.options[i] = null;
            }

            listRW.forEach(function(rw) {
                if (rw.kelurahan_id == KelurahanId) {
                    var option = document.createElement("option");
                    option.text = rw.name;
                    option.id = rw.kelurahan_id;
                    option.value = rw.id;
                    select.add(option);

                }
            });

            var length2 = select.options.length;
            if (length2 > 0) {
                for (i = length2 - 1; i >= 0; i--) {
                    if (select.options[i].selected === true) {
                        filterRT(select.options[i].value)
                    }
                }
            } else {
                filterRT(0)
            }

        }

        //filter rt dropdown
        var listRT = [];

        function filterRT(rwId) {
            if (listRT.length == 0) {
                Array.from(document.querySelector("#rt_id").options).
                forEach(function(option_element) {
                    let option_text = option_element.text;
                    let option_value = option_element.value;
                    let rw_id = option_element.id;
                    let is_option_selected = option_element.selected;

                    console.log('value : ' + rwId);
                    console.log('Option Text : ' + option_text);
                    console.log('Option Value : ' + option_value);
                    console.log('Option rw_id : ' + rw_id);
                    console.log('Option Selected : ' + (is_option_selected === true ? 'Yes' : 'No'));

                    console.log("\n\r");
                    var rt = {
                        id: option_value,
                        name: option_text,
                        rw_id: rw_id
                    };

                    listRT.push(rt);

                });

                AddOptionRT(rwId)
            } else {

                AddOptionRT(rwId)
            }

        }

        function AddOptionRT(rwId) {
            var select = document.getElementById("rt_id");
            var length = select.options.length;
            for (i = length - 1; i >= 0; i--) {
                select.options[i] = null;
            }

            listRT.forEach(function(rt) {
                if (rt.rw_id == rwId) {
                    var option = document.createElement("option");
                    option.text = rt.name;
                    option.id = rt.rw_id;
                    option.value = rt.id;
                    select.add(option);

                }
            });


        }

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