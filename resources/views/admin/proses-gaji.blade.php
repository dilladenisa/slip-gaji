<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Gaji</title>
    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }
        .print-button {
            display: flex;
            justify-content: flex-end;
            margin: 20px;
        }
        .print-button button {
            padding: 10px 20px;
            font-size: 14px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .print-button button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 10px; /* Ukuran font lebih kecil untuk muat lebih banyak data */
        }
        th, td {
            padding: 5px; /* Padding lebih kecil untuk menghemat ruang */
            border: 1px solid #ddd;
            text-align: center;
        }
        thead th {
            background-color: #f0f0f0;
            color: #333;
            font-weight: bold;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        footer {
            text-align: center;
            font-size: 8px; /* Ukuran font footer lebih kecil */
            color: #888;
            margin-top: 30px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function cetakPDF() {
            const element = document.getElementById('content');
            const opt = {
                margin:       0.5,
                filename:     'Slip_Gaji.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { orientation: 'landscape', unit: 'in', format: 'letter', orientation: 'landscape' } // Mengatur format lanskap
            };
            html2pdf()
                .from(element)
                .set(opt)
                .save();
        }
    </script>
</head>
<body>
    <a href="/admin">kembali</a>
    <div class="print-button">
        <button onclick="cetakPDF()">Cetak Slip Gaji ke PDF</button>
    </div>

    <div id="content">
        <h2>Slip Gaji {{ $bulan ? 'Bulan ' . $bulan : 'Semua Bulan' }}</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Nama Pegawai</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                    <th>Gaji</th>
                    <th>Tunjangan Kinerja</th>
                    <th>Transport</th>
                    <th>Uang Makan</th>
                    <th>Koperasi</th>
                    <th>PTWP</th>
                    <th>IKAHI</th>
                    <th>IPASPI</th>
                    <th>Dana Sosial</th>
                    <th>PPHM</th>
                    <th>Infaq Masjid</th>
                    <th>Potongan Lain</th>
                    <th>Jumlah Potongan</th>
                    <th>Jumlah Akhir</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @forelse ($dataGaji as $gaji)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $gaji->bulan }}</td>
                        <td>{{ $gaji->nama_pegawai }}</td>
                        <td>{{ $gaji->nip }}</td>
                        <td>{{ $gaji->jabatan }}</td>
                        <td>{{ number_format($gaji->gaji, 0, ',', '.') }}</td>
                        <td>{{ number_format($gaji->tunjangan_kinerja, 0, ',', '.') }}</td>
                        <td>{{ number_format($gaji->transport, 0, ',', '.') }}</td>
                        <td>{{ number_format($gaji->uang_makan, 0, ',', '.') }}</td>
                        <td>{{ number_format($gaji->koperasi, 0, ',', '.') }}</td>
                        <td>{{ number_format($gaji->ptwp, 0, ',', '.') }}</td>
                        <td>{{ number_format($gaji->ikahi, 0, ',', '.') }}</td>
                        <td>{{ number_format($gaji->ipaspi, 0, ',', '.') }}</td>
                        <td>{{ number_format($gaji->dana_sosial, 0, ',', '.') }}</td>
                        <td>{{ number_format($gaji->pphm, 0, ',', '.') }}</td>
                        <td>{{ number_format($gaji->infaq_mesjid, 0, ',', '.') }}</td>
                        <td>{{ number_format($gaji->pot_lain_lain, 0, ',', '.') }}</td>
                        <td>{{ number_format($gaji->jumlah_pot, 0, ',', '.') }}</td>
                        <td>{{ number_format($gaji->jumlah_akhir, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="19">Data tidak ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <footer>
            Copyright © Pengadilan Agama 2024
        </footer>
    </div>
</body>
</html>
