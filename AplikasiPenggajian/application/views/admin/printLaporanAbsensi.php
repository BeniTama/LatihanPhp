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
            <th class="text-center">Nomor</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Hadir</th>
            <th class="text-center">Sakit</th>
            <th class="text-center">Alpha</th>
        </tr>
        <?php
        $no = 1;
        foreach ($lap_kehadiran as $lp) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $lp->nama_pegawai; ?></td>
                <td><?= $lp->nik; ?></td>
                <td><?= $lp->jenis_kelamin; ?></td>
                <td><?= $lp->nama_jabatan; ?></td>
                <td><?= $lp->hadir; ?></td>
                <td><?= $lp->sakit; ?></td>
                <td><?= $lp->alpha; ?></td>
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