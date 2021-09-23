<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>@yield('title')</title>
    <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
    <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- select2 CSS -->
    <link href="{{asset('template')}}/vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris Charts CSS -->
    <link href="{{asset('template')}}/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css" />
    <!-- Data table CSS -->
    <link href="{{asset('template')}}/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('template')}}/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="{{asset('template')}}/dist/css/style.css" rel="stylesheet" type="text/css">
    <!-- Editable -->
    <link href="{{asset('template')}}/vendors/editable/bootstrap-editable.css" rel="stylesheet" type="text/css" />
    <!-- select2 CSS -->
    <link href="{{asset('template')}}/vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- bootstrap-tagsinput CSS -->
    <link href="vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="wrapper theme-1-active box-layout pimary-color-red">
        <!-- Top Menu Items Navbar/Header -->
        <nav class="navbar  navbar-inverse navbar-fixed-top">
            <div class="mobile-only-brand pull-left">
                <div class="nav-header pull-left">
                    <div class="logo-wrap">
                        <a href="index.html">
                            <img class="brand-img" src="{{asset('template')}}/dist/img/nakulasadewa.png" alt="brand" />
                            <span class="brand-text">Inventory Sistem</span>
                        </a>
                    </div>
                </div>
                <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
                <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
                <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
            </div>


            <div id="mobile_only_nav" class="mobile-only-nav pull-right">
                <ul class="nav navbar-right top-nav pull-right">

                    <li class="dropdown auth-drp">
                        <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="{{asset('template')}}/dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle" /><span class="user-online-status"></span></a>
                        <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                            <li>
                                <a href="profile.html"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /Top Menu Items -->

        <!-- Left Sidebar Menu -->
        <div class="fixed-sidebar-left">
            <ul class="nav navbar-nav side-nav nicescroll-bar">
                <li class="navigation-header">
                    <span><strong>{{ Auth::user()->divisi }}</strong></span>
                    <i class="zmdi zmdi-more"></i>
                </li>
                <li>
                    <a href="dashboard/home">
                        <div class="pull-left"><i class="fa fa-home mr-20"></i><span class="right-nav-text">Home</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>

                <!-- <-------------------------------WAREHOUSE----------------------------------->
                @if (auth()->user()->divisi == "warehouse")
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr">
                        <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Master data</span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="dashboard_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="{{ url('warehouse/barang') }}">Data barang</a>
                        </li>
                        <li>
                            <a href="{{ url('warehouse/kategori') }}">Data kategori</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr">
                        <div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Transaksi</span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="ecom_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="{{ url('warehouse/transaksi/masukbaru/tambah') }}">Barang masuk</a>
                        </li>
                        <li>
                            <a href="{{ url('warehouse/transaksi/keluarbaru/tambah') }}">Barang keluar</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#transaksi">Data Transaksi<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                                <div class="clearfix"></div>
                            </a>

                            <ul id="transaksi" class="collapse collapse-level-2">
                                <li>
                                    <a href="{{ url('warehouse/transaksi/masuk') }}">Transaksi Masuk</a>
                                </li>
                                <li>
                                    <a href="{{ url('warehouse/transaksi/keluar') }}">Transaksi Keluar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('warehouse/supplier') }}">
                        <div class="pull-left"><i class="zmdi zmdi-accounts-alt mr-20"></i><span class="right-nav-text">Data supplier</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('warehouse/instansi') }}">
                        <div class="pull-left"><i class="zmdi zmdi-accounts-alt mr-20"></i><span class="right-nav-text">Data instansi</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#pengajuan">
                        <div class="pull-left"><i class="zmdi zmdi-collection-text mr-20"></i><span class="right-nav-text">Pengajuan</span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="pengajuan" class="collapse collapse-level-1">
                        
                        <li>
                            <a href="/warehouse/pengajuan/brgretur">Barang retur</a>
                        </li>
                        <li>
                            <a href="/warehouse/pengajuan/pembelian">Pengajuan Pembelian</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('warehouse/peminjaman') }}">
                        <div class="pull-left"><i class="zmdi zmdi-balance-wallet mr-20"></i><span class="right-nav-text">Peminjaman</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#pembelian">
                        <div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Pembelian</span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="pembelian" class="collapse collapse-level-1">
                        <li>
                            <a href="/warehouse/pembelian/purchase">Purchasing</a>
                        </li>
                        <li>
                            <a href="/warehouse/pembelian/invoice">Invoice</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('warehouse/so/dataSO') }}">
                        <div class="pull-left"><i class="zmdi zmdi-shopping-cart mr-20"></i><span class="right-nav-text">Data SO</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li>
                    <a href=" ">
                        <div class="pull-left"><i class="zmdi zmdi-settings mr-20"></i><span class="right-nav-text">Setting</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                @endif

                <!-- <-------------------------------MARKETING----------------------------------->
                @if (auth()->user()->divisi == "marketing")
                <li>
                    <a href="{{ url('marketing/instansi') }}">
                        <div class="pull-left"><i class="zmdi zmdi-accounts-alt mr-20"></i><span class="right-nav-text">Data instansi</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#pengajuan">
                        <div class="pull-left"><i class="zmdi zmdi-collection-text mr-20"></i><span class="right-nav-text">Pengajuan</span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="pengajuan" class="collapse collapse-level-1">
                        <li>
                            <a href="/brgbaru">Barang rekomendasi</a>
                        </li>
                        <li>
                            <a href="/brgretur">Barang retur</a>
                        </li>
                        <li>
                            <a href="/pengpembelian">Pengajuan Pembelian</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('marketing/po') }}">
                        <div class="pull-left"><i class="zmdi zmdi-shopping-cart mr-20"></i><span class="right-nav-text">Puchase Order</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                @endif


                <!-- <-------------------------------TEKNISI----------------------------------->
                @if (auth()->user()->divisi == "teknisi")
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#pengajuan">
                        <div class="pull-left"><i class="zmdi zmdi-collection-text mr-20"></i><span class="right-nav-text">Pengajuan</span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="pengajuan" class="collapse collapse-level-1">
                        <li>
                            <a href="/brgbaru">Barang rekomendasi</a>
                        </li>
                        <li>
                            <a href="/brgretur">Barang retur</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('teknisi/peminjaman') }}">
                        <div class="pull-left"><i class="zmdi zmdi-balance-wallet mr-20"></i><span class="right-nav-text">Peminjaman</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                @endif



                <!-- <-------------------------------ADMIN----------------------------------->
                @if (auth()->user()->divisi == "admin")
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#pengajuan">
                        <div class="pull-left"><i class="zmdi zmdi-collection-text mr-20"></i><span class="right-nav-text">Pengajuan</span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="pengajuan" class="collapse collapse-level-1">
                        <li>
                            <a href="{{ url('admin/pengajuan/pembelian') }}">Pengajuan Pembelian</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('admin/po') }}">
                        <div class="pull-left"><i class="zmdi zmdi-shopping-cart mr-20"></i><span class="right-nav-text">Puchase Order</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                @endif

                <!-- <-------------------------------PURCHASING----------------------------------->
                @if (auth()->user()->divisi == "purchasing")
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#pengajuan">
                        <div class="pull-left"><i class="zmdi zmdi-collection-text mr-20"></i><span class="right-nav-text">Pengajuan</span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="pengajuan" class="collapse collapse-level-1">
                    <li>
                            <a href="/purchasing/pengajuan/brgretur">Barang retur</a>
                        </li>
                        <li>
                            <a href="/purchasing/pengajuan/pembelian">Pengajuan Pembelian</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#pembelian">
                        <div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Pembelian</span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="pembelian" class="collapse collapse-level-1">
                        <li>
                            <a href="/purchasing/pembelian/purchase">Purchasing</a>
                        </li>
                        <li>
                            <a href="/purchasing/pembelian/pembelian">Invoice</a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- <-------------------------------ADMINISTRATOR----------------------------------->
                @if (auth()->user()->divisi == "administrator")
                <li>
                    <a href="{{ url('administrator/user') }}">
                        <div class="pull-left"><i class="zmdi zmdi-account mr-20"></i><span class="right-nav-text">User</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('administrator/log') }}">
                        <div class="pull-left"><i class="zmdi zmdi-search-in-file mr-20"></i><span class="right-nav-text">Log Sistem</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                @endif
                <!-- <-------------------------------OFFICE----------------------------------->


                <li>
                    <a href="{{ route('logout') }}">
                        <div class="pull-left"><i class="zmdi zmdi-power-setting mr-20"></i><span class="right-nav-text">Logout</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /Left Sidebar Menu -->

        @yield('content')

    </div>
    <!-- /#wrapper -->

    <!-- Select2 JavaScript -->
    <script src="{{asset('template')}}/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- jQuery -->
    <script src="{{asset('template')}}/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('template')}}/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Data table JavaScript -->
    <script src="{{asset('template')}}/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('template')}}/dist/js/dataTables-data.js"></script>
    <!-- Slimscroll JavaScript -->
    <script src="{{asset('template')}}/dist/js/jquery.slimscroll.js"></script>
    <!-- simpleWeather JavaScript -->
    <script src="{{asset('template')}}/vendors/bower_components/moment/min/moment.min.js"></script>
    <script src="{{asset('template')}}/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
    <script src="{{asset('template')}}/dist/js/simpleweather-data.js"></script>
    <!-- Editable -->
    <script src="{{asset('template')}}/vendors/editable/bootstrap-editable.min.js"></script>
    <script src="{{asset('template')}}/vendors/editable/jquery.xeditable.js"></script>
    <!-- Progressbar Animation JavaScript -->
    <script src="{{asset('template')}}/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{asset('template')}}/vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
    <!-- Fancy Dropdown JS -->
    <script src="{{asset('template')}}/dist/js/dropdown-bootstrap-extended.js"></script>
    <!-- Sparkline JavaScript -->
    <script src="{{asset('template')}}/vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Owl JavaScript -->
    <script src="{{asset('template')}}/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
    <!-- ChartJS JavaScript -->
    <script src="{{asset('template')}}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{asset('template')}}/dist/js/morris-data.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="{{asset('template')}}/vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="{{asset('template')}}/vendors/bower_components/morris.js/morris.min.js"></script>
    <!-- Switchery JavaScript -->
    <script src="{{asset('template')}}/vendors/bower_components/switchery/dist/switchery.min.js"></script>
    <!-- Init JavaScript -->
    <script src="{{asset('template')}}/dist/js/init.js"></script>
    <script src="{{asset('template')}}/dist/js/dashboard-data.js"></script>
    <!-- Select2 JavaScript -->
    <script src="{{asset('template')}}/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Bootstrap Select JavaScript -->
    <script src="{{asset('template')}}/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    @yield('scripts')

</body>

</html>