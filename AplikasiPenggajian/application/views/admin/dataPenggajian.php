<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- Content Row -->
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Data Gaji Pegawai
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label for="">Bulan: </label>
                    <select class="form-control ml-2" name="bulan">
                        <option value="">--Pilih Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="" class="ml-5">Tahun: </label>
                    <select class="form-control ml-2" name="tahun">
                        <option value="">--Pilih Tahun--</option>
                        <?php $tahun = date('Y');
                        for ($i = 2020; $i < $tahun + 5; $i++) { ?>
                            <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php } ?>
                    </select>
                </div>

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

                <button type="submit" class="btn btn-primary mb-2 ml-auto">
                    <i class="fas fa-eye"></i>
                    Tampilkan Data
                </button>
                <?php if (count($gaji) > 0) { ?>
                    <a href="<?= base_url('admin/DataPenggajian/printPenggajian?bulan=' . $bulan), '&tahun=' . $tahun ?>" class="btn btn-success mb-2 ml-4">
                        <i class="fas fa-print"></i>
                        Cetak Daftar Gaji
                    </a>
                <?php } else { ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success mb-2 ml-3" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-print"></i>
                        Cetak Daftar Gaji
                    </button>
                <?php } ?>
            </form>
        </div>
    </div>

    <div class="alert alert-info">
        Menampilkan Data Gaji Pegawai Bulan: <span class="font-weight-bold"><?= $bulan; ?></span> Tahun: <span class="font-weight-bold"><?= $tahun; ?></span>
    </div>

    <?php

    $jml_data = count($gaji);
    if ($jml_data > 0) {
    ?>

        <div class="table-responsive">
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
                foreach ($gaji as $g) : ?>
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
        </div>
    <?php } else { ?>
        <span class="badge badge-danger">
            <i class="fas fa-info-circle"></i>
            Data masih kosong, silakan input data kehadiran di bulan dan tahun yang ingin dipilih!
        </span>
    <?php } ?>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Data gaji yang dipilih masih kosong, silahkan input data absensi terlebih dahulu pada bulan dan tahun yang dipilih!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>