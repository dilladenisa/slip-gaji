<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .header h3 {
            margin: 0;
            font-size: 16px;
        }
        .details, .salary {
            width: 100%;
            margin-bottom: 15px;
            font-size: 12px;
            border-collapse: collapse;
        }
        .details td {
            padding: 5px;
        }
        .salary td, .salary th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .salary th {
            background-color: #f9f9f9;
            font-weight: bold;
        }
        .footer {
            text-align: right;
            margin-top: 30px;
        }
        .footer span {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h3>MAHKAMAH AGUNG REPUBLIK INDONESIA</h3>
        <h3>DIREKTORAT JENDERAL BADAN PERADILAN AGAMA</h3>
        <h3>PENGADILAN TINGGI AGAMA BANDUNG</h3>
        <h3>PENGADILAN AGAMA SOREANG</h3>
        <p>Jl. Raya Soreang KM. 16 Kab. Bandung</p>
        <p>Website: <a href="http://www.pa-soreang.go.id">www.pa-soreang.go.id</a>, E-mail: surat@pa-soreang.go.id</p>
        <p><strong>SOREANG - 40912</strong></p>
        <hr>
    </div>

    <div>
        <h3 style="text-align:center;">DAFTAR PERINCIAN GAJI/PENGHASILAN</h3>
        <p style="text-align:center;">Bulan: <strong><?php echo $gaji['bulan']; ?></strong></p>
    </div>

    <table class="details">
        <tr>
            <td>Nama Pegawai</td>
            <td>: <?php echo $gaji['name']; ?></td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>: <?php echo $gaji['nip']; ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>: <?php echo $gaji['jabatan']; ?></td>
        </tr>
    </table>

    <table class="salary">
        <tr>
            <th>Komponen</th>
            <th>Jumlah</th>
        </tr>
        <tr>
            <td>Gaji</td>
            <td>Rp <?php echo number_format($gaji['gaji'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>Tunjangan Kinerja</td>
            <td>Rp <?php echo number_format($gaji['tunjangan_kinerja'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>Tunjangan Transport</td>
            <td>Rp <?php echo number_format($gaji['transport'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>Uang Makan</td>
            <td>Rp <?php echo number_format($gaji['uang_makan'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <th>Potongan</th>
            <th></th>
        </tr>
        <tr>
            <td>Koperasi</td>
            <td>Rp <?php echo number_format($gaji['koperasi'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>PTWP</td>
            <td>Rp <?php echo number_format($gaji['ptwp'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>IKAHI</td>
            <td>Rp <?php echo number_format($gaji['ikahi'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>IPASPI</td>
            <td>Rp <?php echo number_format($gaji['ipaspi'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>Dana Sosial</td>
            <td>Rp <?php echo number_format($gaji['dana_sosial'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>PPHIM</td>
            <td>Rp <?php echo number_format($gaji['pphim'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>Dharmayukti</td>
            <td>Rp <?php echo number_format($gaji['dharmayukti'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>Infaq Masjid</td>
            <td>Rp <?php echo number_format($gaji['infaq_masjid'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>Potongan Lain</td>
            <td>Rp <?php echo number_format($gaji['pot_lain_lain'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <th>Total Potongan</th>
            <th>Rp <?php echo number_format($gaji['jumlah_pot'], 0, ',', '.'); ?></th>
        </tr>
        <tr>
            <th>Total Gaji Diterima</th>
            <th>Rp <?php echo number_format($gaji['jumlah_akhir'], 0, ',', '.'); ?></th>
        </tr>
    </table>

    <div class="footer">
        <span>Soreang, <?php echo $tanggal; ?></span>
        <span>Bendahara Pengeluaran,</span>
        <br><br><br>
        <span>Santi Pebiana, A.Md.</span>
        <span>NIP. 199502272022032012</span>
    </div>
</body>
</html>