<head>
    <title><?= $title ?></title>
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: black;
        }
    </style>
</head>

<body>
    <center>
        <h1>PT. ROLUPALU JAYA</h1>
        <h2>Daftar Gaji Pegawai</h2>
    </center>

    <?php
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];

        $bulantahun = $bulan . $tahun;
    } else {
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan . $tahun;
    }
    ?>

    <table>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td><?= $bulan; ?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?= $tahun; ?></td>
        </tr>
    </table>

    <table class="table table-bordered table-striped">
        <tr>
            <td class="text-center">Nomor</td>
            <td class="text-center">NIK</td>
            <td class="text-center">Nama Pegawai</td>
            <td class="text-center">Jenis Kelamin</td>
            <td class="text-center">Jabatan</td>
            <td class="text-center">Gaji Pokok</td>
            <td class="text-center">Tj. Transport</td>
            <td class="text-center">Uang Makan</td>
            <td class="text-center">Potongan</td>
            <td class="text-center">Total Gaji</td>
        </tr>
        <?php
        foreach ($potongan as $p) {
            if (($p->potongan) == 'Alpha') {
                $pot_alpha = $p->jml_potongan;
            } elseif (($p->potongan) == 'Sakit') {
                $pot_sakit = $p->jml_potongan;
            }
        }
        $no = 1;
        foreach ($printGaji as $g) : ?>
            <?php
            $potongan = ($g->alpha * $pot_alpha) + ($g->sakit * $pot_sakit);
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $g->nik; ?></td>
                <td><?= $g->nama_pegawai; ?></td>
                <td><?= $g->jenis_kelamin; ?></td>
                <td><?= $g->nama_jabatan; ?></td>
                <td>Rp. <?= number_format($g->gaji_pokok, 0, ',', '.'); ?></td>
                <td>Rp. <?= number_format($g->tj_transport, 0, ',', '.'); ?></td>
                <td>Rp. <?= number_format($g->uang_makan, 0, ',', '.'); ?></td>
                <td>Rp. <?= number_format($potongan, 0, ',', '.'); ?></td>
                <td>Rp. <?= number_format($g->gaji_pokok + $g->tj_transport + $g->uang_makan - $potongan, 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <table width=100%>
        <tr>
            <td></td>
            <td width=200px>
                Malang, <?= date("d M Y") ?>
                <br />Finance
                <br /><br />
                <br /><br />
                <p>___________________________</p>
                </p>
            </td>
        </tr>
    </table>
</body>

<script type="text/javascript">
    window.print();
</script>