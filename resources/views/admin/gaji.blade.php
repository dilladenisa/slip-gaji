<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <form action="{{ url('/gaji') }}" method="GET" class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                    <i class="ti-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="navbar-search-input" name="query" placeholder="Search now"
                                aria-label="search" aria-describedby="search">
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        {{-- <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-bs-toggle="dropdown">
                            <i class="ti-bell mx-0"></i>
                            <span class="count"></span>
                        </a> --}}
                        {{-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
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
                        </div> --}}
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
                        <a class="nav-link text-black" data-bs-toggle="collapse" href="#tables" aria-expanded="false"
                            aria-controls="tables">
                            <i class="ti-view-list-alt menu-icon text-black"></i>
                            <span class="menu-title text-black">Tables</span>
                            <i class="menu-arrow  text-black"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/gaji">Data
                                        Pegawai</a></li>
                            </ul>
                        </div>
                    </li>
                    {{-- @if (Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#userpg" aria-expanded="false"
                                aria-controls="userpg">
                                <i class="ti-user menu-icon"></i>
                                <span class="menu-title">User Pages</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="userpg">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"><a class="nav-link"
                                            href="{{ url('/mastercontrol') }}">Control
                                            Akun
                                            User</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif --}}
                    <li class="nav-item">
                        <a class="nav-link" href="/cetak">
                            <i class="ti-printer menu-icon text-black"></i>
                            <span class="menu-title text-black">Cetak</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/dilladenisa/slip-gaji" target="_blank">
                            <i class="ti-write menu-icon text-black"></i>
                            <span class="menu-title text-black">Documentation</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="font-weight-bold mb-0">Data Gaji Pegawai</h4>
                                </div>
                                <div>
                                    <button id="printButton" class="btn btn-primary btn-icon-text btn-rounded text-white" style="display: none;" onclick="printSelectedData()">Cetak Data</button>
                                    <a href="{{ route('gaji.create') }}" class="text-decoration-none text-white">
                                        <button type="button" class="btn btn-primary btn-icon-text btn-rounded text-white">
                                            <i class="ti-plus btn-icon-prepend text-white"></i>Tambah Data
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="month">Pilih Bulan:</label>
                            <select id="month" class="form-control">
                                <option value="">Semua Bulan</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="year">Pilih Tahun:</label>
                            <select id="year" class="form-control">
                                <option value="">Semua Tahun</option>
                                @php
                                    $currentYear = date('Y');
                                    for ($i = $currentYear; $i >= ($currentYear - 5); $i--) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                @endphp
                            </select>
                        </div>
                        <div class="col-md-3 d-flex align-items-end ">
                            <button class="btn btn-primary btn-rounded text-white" onclick="filterData()">Filter</button>
                        </div> 
                    </div>                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire(
                                    'Sukses',
                                    '{{ Session::get('success') }}',
                                    'success'
                                );
                            });
                        </script>
                    @endif
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Gaji Pegawai</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="selectAll" onclick="toggleSelectAll(this)"> Pilih Semua</th>
                                                <th>No</th>
                                                <th>
                                                    BULAN
                                                </th>
                                                <th>
                                                    TAHUN
                                                </th>
                                                <th>
                                                    NAMA PEGAWAI
                                                </th>
                                                <th>
                                                    NIP
                                                </th>
                                                <th>
                                                    JABATAN
                                                </th>
                                                <th>
                                                    GAJI
                                                </th>
                                                <th>
                                                    TUNJANGAN KINERJA
                                                </th>
                                                <th>
                                                    TRANSPORT
                                                </th>
                                                <th>
                                                    UANG MAKAN
                                                </th>
                                                <th>
                                                    KOPERASI
                                                </th>
                                                <th>
                                                    PTWP
                                                </th>
                                                <th>
                                                    IKAHI
                                                </th>
                                                <th>
                                                    IPASPI
                                                </th>
                                                <th>
                                                    DANA SOSIAL
                                                </th>
                                                <th>
                                                    PPHIM
                                                </th>
                                                <th>
                                                    INFAQ MESJID
                                                </th>
                                                <th>
                                                    POT LAIN-LAIN
                                                </th>
                                                <th>
                                                    JUMLAH POTONGAN
                                                </th>
                                                <th>
                                                    JUMLAH AKHIR
                                                </th>
                                                <th>
                                                    AKSI
                                                </th>
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($gaji as $item)
                                            <tbody>
                                                <td><input type="checkbox" class="dataCheckbox" value="{{ $item->id }}" onchange="togglePrintButton()"></td>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->bulan }}</td>
                                                <td>{{ $item->tahun }}</td>
                                                {{-- <td>{{ $item->nama_pegawai }}</td> --}}
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->nip }}</td>
                                                <td>{{ $item->jabatan }}</td>
                                                <td>{{ $item->gaji }}</td>
                                                <td>{{ $item->tunjangan_kinerja }}</td>
                                                <td>{{ $item->transport }}</td>
                                                <td>{{ $item->uang_makan }}</td>
                                                <td>{{ $item->koperasi }}</td>
                                                <td>{{ $item->ptwp }}</td>
                                                <td>{{ $item->ikahi }}</td>
                                                <td>{{ $item->ipaspi }}</td>
                                                <td>{{ $item->dana_sosial }}</td>
                                                <td>{{ $item->pphim }}</td>
                                                <td>{{ $item->infaq_mesjid }}</td>
                                                <td>{{ $item->pot_lain_lain }}</td>
                                                <td>{{ $item->jumlah_pot }}</td>
                                                <td>{{ $item->jumlah_akhir }}</td>
                                                <td><a href="/gaji/{{ $item->id }}"
                                                    <a href="/gaji/edit/{{ $item->id }}" class="btn-sm btn-success text-white text-decoration-none rounded-pill">Edit</a>
                                                    <form onsubmit="return confirmDelete(event)" class="d-inline" action="/gaji/hapus/{{ $item->id }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn-sm btn-danger text-white rounded-pill">Del</button>
                                                    </form> 
                                                </td>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
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
    <script src="{{ asset('dashboard/js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        function confirmDelete(event) {
            event.preventDefault();
    
            Swal.fire({
                title: 'Yakin Hapus Data?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    event.target.submit();
                } else {
                    swal('Data aman!');
                }
            });
        }
        function togglePrintButton() {
        const checkboxes = document.querySelectorAll('.dataCheckbox');
        const printButton = document.getElementById('printButton');
        printButton.style.display = Array.from(checkboxes).some(checkbox => checkbox.checked) ? 'inline' : 'none';
    }

    function toggleSelectAll(selectAllCheckbox) {
        const checkboxes = document.querySelectorAll('.dataCheckbox');
        checkboxes.forEach(checkbox => checkbox.checked = selectAllCheckbox.checked);
        togglePrintButton();
    }

    function printSelectedData() {
    const selectedDataIds = Array.from(document.querySelectorAll('.dataCheckbox:checked')).map(cb => cb.value);

    if (selectedDataIds.length > 0) {
        fetch("{{ route('gaji.cetak-personal') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ ids: selectedDataIds })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                generatePDF(data.data);
            } else {
                alert('Terjadi kesalahan dalam pengambilan data.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal mengambil data. Silakan coba lagi.');
        });
    } else {
        alert('Pilih setidaknya satu data untuk dicetak.');
    }
}


function generatePDF(data) {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    
    data.forEach((item, index) => {
        doc.setFontSize(12);
        
        // Header dokumen
        doc.text("MAHKAMAH AGUNG REPUBLIK INDONESIA", 105, 20, { align: "center" });
        doc.text("DIREKTORAT JENDERAL BADAN PERADILAN AGAMA", 105, 27, { align: "center" });
        doc.text("PENGADILAN AGAMA SOREANG", 105, 34, { align: "center" });
        
        // Informasi Pegawai
        doc.text(`Nama Pegawai: ${item.name}`, 20, 50);
        doc.text(`NIP: ${item.nip}`, 20, 58);
        doc.text(`Jabatan: ${item.jabatan}`, 20, 66);
        
        // Bagian Gaji
        let yPosition = 80;
        doc.text("DAFTAR PERINCIAN GAJI/PENGHASILAN", 20, yPosition);
        yPosition += 10;
        
        doc.text(`Gaji: Rp. ${item.gaji}`, 20, yPosition);
        yPosition += 10;
        
        doc.text(`Tunjangan Kinerja: Rp. ${item.tunjangan_kinerja}`, 20, yPosition);
        yPosition += 10;
        
        doc.text(`Tunjangan Transport: Rp. ${item.transport}`, 20, yPosition);
        yPosition += 10;
        
        doc.text(`Uang Makan: Rp. ${item.uang_makan}`, 20, yPosition);
        yPosition += 10;
        
        doc.text(`Jumlah Penghasilan: Rp. ${item.jumlah_pot}`, 20, yPosition);
        
        // Potongan-potongan
        yPosition += 20;
        doc.text("Potongan-potongan Kantor:", 20, yPosition);
        yPosition += 10;
        
        doc.text(`Koperasi: Rp. ${item.koperasi}`, 20, yPosition);
        yPosition += 10;
        
        doc.text(`PTWP: Rp. ${item.ptwp}`, 20, yPosition);
        yPosition += 10;
        
        // Jumlah penghasilan diterima
        yPosition += 20;
        doc.text(`Jumlah Penghasilan Diterima: Rp. ${item.jumlah_akhir}`, 20, yPosition);
        
        // Penandatangan
        yPosition += 40;
        doc.text("Soreang, 12 September 2024", 140, yPosition);
        yPosition += 10;
        doc.text("Bendahara Pengeluaran,", 140, yPosition);
        yPosition += 20;
        doc.text("Santi Pebiana, A.Md.", 140, yPosition);
        
        if (index < data.length - 1) doc.addPage();
    });

    // Mendownload PDF
    doc.save("data_gaji.pdf");
}


function filterData() {
    const month = document.getElementById('month').value;
    const year = document.getElementById('year').value;

    // Redirect halaman dengan parameter filter bulan dan tahun
    const urlParams = new URLSearchParams(window.location.search);
    if (month) urlParams.set('month', month);
    else urlParams.delete('month');

    if (year) urlParams.set('year', year);
    else urlParams.delete('year');

    window.location.search = urlParams.toString();
}




    </script>
</body>

</html>