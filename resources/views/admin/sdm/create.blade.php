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

            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">

            </form>

            <!-- Right navbar links -->

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
                            <a href="#" class="nav-link ">
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
                                  @can('change_password_access')
                      <li class="nav-item">
                    <a href="{{ route("admin.edit_password.index") }}" class="nav-link {{ request()->is('admin/edit_password') || request()->is('admin/edit_password/*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Change Password</p>
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
                            <h1>List SDM</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route("admin.index") }}">Home</a></li>
                                <li class="breadcrumb-item active">List SDM</li>
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
                                        <h3 class="card-title">Create SDM</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->

                                    <div class="card-body">
                                        <form action="{{ route("admin.sdm.store") }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group {{ $errors->has('sdm_fullname') ? 'has-error' : '' }}">
                                                <label for="sdm_fullname">{{ trans('global.sdm.fields.sdm_fullname') }}*</label>
                                                <input type="text" id="sdm_fullname" name="sdm_fullname" class="form-control" value="{{ old('sdm_fullname', isset($sdm) ? $sdm->sdm_fullname : '') }}" required>
                                                @if($errors->has('sdm_fullname'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('sdm_fullname') }}
                                                </em>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('global.sdm.fields.sdm_fullname_helper') }}
                                                </p>
                                            </div>
                                            <div class="form-group {{ $errors->has('sdm_no_ktp') ? 'has-error' : '' }}">
                                                <label for="sdm_no_ktp">{{ trans('global.sdm.fields.sdm_no_ktp') }}*</label>
                                                <input type="number" id="sdm_no_ktp" name="sdm_no_ktp" class="form-control" value="{{ old('sdm_no_ktp', isset($sdm) ? $sdm->sdm_no_ktp : '') }}" required>
                                                @if($errors->has('sdm_no_ktp'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('sdm_no_ktp') }}
                                                </em>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('global.sdm.fields.sdm_no_ktp_helper') }}
                                                </p>
                                            </div>
                                            <div class="form-group {{ $errors->has('sdm_phone') ? 'has-error' : '' }}">
                                                <label for="sdm_phone">{{ trans('global.sdm.fields.sdm_phone') }}*</label>
                                                <input type="number" id="sdm_phone" name="sdm_phone" class="form-control" value="{{ old('sdm_phone', isset($sdm) ? $sdm->sdm_phone : '') }}" required>
                                                @if($errors->has('sdm_phone'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('sdm_phone') }}
                                                </em>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('global.sdm.fields.sdm_phone_helper') }}
                                                </p>
                                            </div>
                                            <div class="form-group {{ $errors->has('sdm_join_date') ? 'has-error' : '' }}">
                                                <label for="sdm_join_date">{{ trans('global.sdm.fields.sdm_join_date') }}*</label>
                                                <input type="date" id="sdm_join_date" name="sdm_join_date" class="form-control" value="{{ old('sdm_join_date', isset($sdm) ? $sdm->sdm_join_date : '') }}" required>
                                                @if($errors->has('sdm_join_date'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('sdm_join_date') }}
                                                </em>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('global.sdm.fields.sdm_join_date_helper') }}
                                                </p>
                                            </div>
                                            <!-- <div class="form-group {{ $errors->has('sdm_rt') ? 'has-error' : '' }}">
                                                <label for="sdm_rt">{{ trans('global.sdm.fields.sdm_rt') }}*</label>
                                                <input type="text" id="sdm_rt" name="sdm_rt" class="form-control" value="{{ old('sdm_rt', isset($sdm) ? $sdm->sdm_rt : '') }}">
                                                @if($errors->has('sdm_rt'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('sdm_rt') }}
                                                </em>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('global.sdm.fields.sdm_rt_helper') }}
                                                </p>
                                            </div> -->
                                            <div class="form-group {{ $errors->has('sdm_category') ? 'has-error' : '' }}">
                                                <label for="sdm_category">{{ trans('global.sdm.fields.sdm_category') }}*
                                                    <!-- <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label> -->
                                                    <select name="sdm_category" id="sdm_category" class="form-control select2" required>
                                                        <option selected disabled>Select Category</option>
                                                        @foreach($sdm_categorys as $id => $sdm_category)
                                                        <option value="{{ $id }}" {{ (in_array($id, old('sdm_categorys', [])) || isset($sdm) && $sdm->sdm_category->contains($id)) ? 'selected' : '' }}>
                                                            {{ $sdm_category }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('sdm_category'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('sdm_category') }}
                                                    </em>
                                                    @endif
                                                    <p class="helper-block">
                                                        {{ trans('global.sdm.fields.sdm_category_helper') }}
                                                    </p>
                                            </div>

                                            <input type="text" id="sdm_rt" name="sdm_rt" class="form-control" value="{{$user}}" hidden>
                                            <div>
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
