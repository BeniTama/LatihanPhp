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
        <h2>Slip Gaji Pegawai</h2>
        <hr style="width: 50%; border-width:5px; color: black">
        </hr>
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

    <table style="width: 100%; font-weight:bold;">
        <?php foreach ($slip_gaji as $s) : ?>
            <tr>
                <td width="20%">Nama</td>
                <td width="2%">:</td>
                <td><?= $s->nama_pegawai; ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?= $s->nama_jabatan; ?></td>
            </tr>
        <?php endforeach; ?>
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

    <table class="table table-bordered table-striped mt-5">
        <tr>
            <td class="text-center">Nomor</td>
            <td class="text-center">Keterangan</td>
            <td class="text-center">Jumlah</td>
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
        foreach ($slip_gaji as $sg) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td>Gaji Pokok</td>
                <td>Rp. <?= number_format($sg->gaji_pokok, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td><?= $no++; ?></td>
                <td>Tunjangan Transport</td>
                <td>Rp. <?= number_format($sg->tj_transport, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td><?= $no++; ?></td>
                <td>Uang Makan</td>
                <td>Rp. <?= number_format($sg->uang_makan, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <?php $potongan = ($sg->alpha * $pot_alpha); ?>
                <td><?= $no++; ?></td>
                <td>Potongan</td>
                <td>Rp. <?= number_format($potongan, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <th colspan="2" style="text-align: right;">Total Gaji</th>
                <th>Rp. <?= number_format($sg->gaji_pokok + $sg->tj_transport + $sg->uang_makan - $potongan, 0, ',', '.'); ?></th>
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