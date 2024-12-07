<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Slip Gaji - Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('dashboard/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('dashboard/images/logo_pa.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo me-5" href="/gaji" style="width: 50px; margin-left: -100px;"><img
                        src="{{ asset('dashboard/images/logo_pa.png') }}" class="me-2" alt="logo" style="width: 40px; height: 40px;" /><b
                        style="font-size: 16pt;">Slip Gaji</b></a>
                <a class="navbar-brand brand-logo-mini" href=""><img
                        src="{{ asset('dashboard/images/logo_pa.png') }}" alt="logo" style="width: 40px; height: 40px;" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="ti-view-list"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                    <i class="ti-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                                aria-label="search" aria-describedby="search">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-bs-toggle="dropdown">
                            <i class="ti-bell mx-0"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                            <a class="dropdown-item">
                                <div class="item-thumbnail">
                                    <div class="item-icon bg-success">
                                        <i class="ti-info-alt mx-0"></i>
                                    </div>
                                </div>
                                <div class="item-content">
                                    <h6 class="font-weight-normal">Application Error</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Just now
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item">
                                <div class="item-thumbnail">
                                    <div class="item-icon bg-warning">
                                        <i class="ti-settings mx-0"></i>
                                    </div>
                                </div>
                                <div class="item-content">
                                    <h6 class="font-weight-normal">Settings</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Private message
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item">
                                <div class="item-thumbnail">
                                    <div class="item-icon bg-info">
                                        <i class="ti-user mx-0"></i>
                                    </div>
                                </div>
                                <div class="item-content">
                                    <h6 class="font-weight-normal">New user registration</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        2 days ago
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            id="profileDropdown">
                            <img src="{{ asset('dashboard/images/user.png') }}" alt="profile" style="width: 30px; height: 30px;" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <form action="{{ url('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="ti-power-off text-primary"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="ti-view-list"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        @if (Auth::user()->role === 'admin')
                            <a class="nav-link" href="{{ url('/admin') }}">
                            @else
                                <a class="nav-link" href="{{ url('/user') }}">
                        @endif
                        <i class="ti-shield menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false"
                            aria-controls="tables">
                            <i class="ti-view-list-alt menu-icon"></i>
                            <span class="menu-title">Tables</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/gaji">Data
                                        Pegawai </a></li>
                            </ul>
                        </div>
                    </li>
                    @if (Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#userpg" aria-expanded="false"
                                aria-controls="userpg">
                                <i class="ti-user menu-icon"></i>
                                <span class="menu-title">User Pages</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="userpg">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ url('/mastercontrol') }}">Control
                                            Akun
                                            User</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/cetak">
                            <i class="ti-printer menu-icon text-black"></i>
                            <span class="menu-title text-black">Cetak</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/dilladenisa/slip-gaji" target="_blank">
                            <i class="ti-write menu-icon"></i>
                            <span class="menu-title">Documentation</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Tambah Data Gaji Pegawai</h4>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="forms-sample" method="POST" action="{{ route('create-gaji') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="bulan">Bulan</label>
                                        <input type="text" class="form-control" id="bulan" placeholder="Januari" name="bulan" required value="Januari">
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <input type="text" class="form-control" id="tahun" placeholder="2024" name="tahun" required value="2024">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama Pegawai</label>
                                        <input type="text" class="form-control" id="name" placeholder="Kevin Example" name="name" required value="Islam">
                                    </div>
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="text" class="form-control" id="nip" placeholder="22020000" name="nip" required value="197807062009121003">
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input list="jabatanList" class="form-control" id="jabatan" name="jabatan" placeholder="lainnya" required>
                                        <datalist id="jabatanList">
                                            <option value="Ketua">
                                            <option value="Wakil Ketua">
                                            <option value="Hakim Madya Pratama">
                                            <option value="Hakim Madya Muda">
                                            <option value="Hakim Pratama">
                                            <option value="Sekretaris">
                                            <option value="Panitera">
                                            <option value="Panitera Muda Gugatan">
                                            <option value="Panitera Muda Permohonan">
                                            <option value="Panitera Muda Hukum">
                                            <option value="Kasubbag Umum dan Keuangan">
                                            <option value="Kasubbag Kepegawaian dan Ortala">
                                            <option value="Kasubbag PTIP">
                                            <option value="Pranata Komputer">
                                            <option value="Panitera Pengganti">
                                            <option value="Jurusita">
                                            <option value="Jurusita Pengganti">
                                            <option value="Analis Perkara Peradilan">
                                            <option value="Terampil/ Pelaksana Arsiparis">
                                            <option value="Pengelola Perkara">
                                            <option value="Pengelola BMN">
                                        </datalist>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="gaji">Gaji</label>
                                        <input type="text" class="form-control" id="gaji" placeholder="Gaji" name="gaji" required value="1421800">
                                    </div>
                                    <div class="form-group">
                                        <label for="tunjangan_kinerja">Tunjangan Kinerja</label>
                                        <input type="text" class="form-control" id="tunjangan_kinerja" placeholder="Tunjangan Kinerja" name="tunjangan_kinerja" required value="6447280">
                                    </div>
                                    <div class="form-group">
                                        <label for="transport">Transport</label>
                                        <input type="text" class="form-control" id="transport" placeholder="Transport" name="transport" required value="675000">
                                    </div>
                                    <div class="form-group">
                                        <label for="uang_makan">Uang Makan</label>
                                        <input type="text" class="form-control" id="uang_makan" placeholder="Uang Makan" name="uang_makan" required value="703000">
                                    </div>
                                    <div class="form-group">
                                        <label for="koperasi">Koperasi</label>
                                        <input type="number" class="form-control" id="koperasi" name="koperasi" placeholder="lainnya">
                                        <datalist id="koperasiList">
                                            <option value="1.050.000">
                                            <option value="50.000">
                                            <option value="395.000">
                                            <option value="2.550.000">
                                            <option value="1.775.000">
                                            <option value="300.000">
                                            <option value="550.000">
                                            <option value="100.000">
                                            <option value="350.000">
                                            <option value="1.630.000">
                                            <option value="330.000">
                                            <option value="510.000">
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label for="ptwp">PTWP</label>
                                        <input list="ptwpList" class="form-control" id="ptwp" name="ptwp" placeholder="Pilih PTWP" required>
                                        <datalist id="ptwpList">
                                            <option value="60000">
                                            <option value="45000">
                                            <option value="30000">
                                            <option value="15000">
                                        </datalist>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="ikahi">IKAHI</label>
                                        <input list="ikahiList" class="form-control" id="ikahi" name="ikahi" placeholder="Lainnya" required>
                                        <datalist id="ikahiList">
                                            <option value="40000">
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label for="ipaspi">IPASPI</label>
                                        <input list="ipaspiList" class="form-control" id="ipaspi" name="ipaspi" placeholder="lainnya" required>
                                        <datalist id="ipaspiList">
                                            <option value="30000">
                                            <option value="25000">
                                            <option value="20000">
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label for="dana_sosial">Dana Sosial</label>
                                        <input list="danaSosialList" class="form-control" id="dana_sosial" name="dana_sosial" placeholder="lainnya" required>
                                        <datalist id="danaSosialList">
                                            <option value="30000">
                                            <option value="20000">
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label for="pphim">PPHIM</label>
                                        <input type="text" class="form-control" id="pphim" placeholder="PPHIM" name="pphim" required value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="dharmayukti">Dharmayukti</label>
                                        <input list="dharmayuktiList" class="form-control" id="dharmayukti" name="dharmayukti" placeholder="lainnya" required>
                                        <datalist id="dharmayuktiList">
                                            <option value="145000">
                                            <option value="140000">
                                            <option value="135000">
                                            <option value="130000">
                                            <option value="128000">
                                        </datalist>
                                    </div>   
                                    <div class="form-group">
                                        <label for="infaq_mesjid">Infaq Mesjid</label>
                                        <input list="infaqMesjidList" class="form-control" id="infaq_mesjid" name="infaq_mesjid" placeholder="lainnya" required>
                                        <datalist id="infaqMesjidList">
                                            <option value="250000">
                                            <option value="200000">
                                            <option value="100000">
                                            <option value="50000">
                                        </datalist>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="pot_lain_lain">Pot Lain-Lain</label>
                                        <input type="text" class="form-control" id="pot_lain_lain" placeholder="Pot Lain-Lain" name="pot_lain_lain" required value="402000" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_pot">Jumlah Potongan</label>
                                        <input type="text" class="form-control" id="jumlah_pot" placeholder="Jumlah Potongan" name="jumlah_pot" required value="22654000" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="jumlah_akhir">Jumlah Akhir</label>
                                        <input type="text" class="form-control" id="jumlah_akhir" placeholder="Jumlah Akhir" name="jumlah_akhir" required value="23983000" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    </div>                                    
                                    <button type="submit" class="btn btn-primary me-2 text-white rounded-pill">Tambah</button>
                                    <a href="/gaji" class="btn btn-light rounded-pill">Kembali</a>
                                    </form>                                    
                            </div>
                        </div>
                    </div>
                </div>
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a
                                target="_blank">Pengadilan Agama
                            </a>2024</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('dashboard/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('dashboard/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('dashboard/js/off-canvas.js') }}"></script>
    <script src="{{ asset('dashboard/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('dashboard/js/template.js') }}"></script>
    <script src="{{ asset('dashboard/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('dashboard/js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
    {{-- Sweet Alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>