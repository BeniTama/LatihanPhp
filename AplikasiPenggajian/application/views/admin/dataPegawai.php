<!-- Begin Page Content -->
<div class="container-fluid" style="margin-bottom: 100px;">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <!-- Content Row -->
    <a class="mb-3 mt-2 btn btn-sm btn-success" href="<?= base_url('admin/dataPegawai/tambahData') ?>">
        <i class="fas fa-plus"></i> Tambah Pegawai
    </a>

    <table class="table table-bordered table-striped mt-2">
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nama Karyawan</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Tanggal Masuk</th>
            <th class="text-center">Status</th>
            <th class="text-center">Hak Akses</th>
            <th class="text-center">Photo</th>
            <th class="text-center">Action</th>
        </tr>
        <?php $no = 1;
        foreach ($pegawai as $p) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $p->nik; ?></td>
                <td><?= $p->nama_pegawai; ?></td>
                <td><?= $p->jenis_kelamin; ?></td>
                <td><?= $p->jabatan; ?></td>
                <td><?= $p->tanggal_masuk; ?></td>
                <td><?= $p->status; ?></td>
                <td>
                    <?php if ($p->hak_akses == 1) { ?>
                        Admin
                    <?php } else { ?>
                        Pegawai
                    <?php } ?>
                </td>
                <td><img src="<?= base_url() . 'assets/photo/' . $p->photo; ?>" width="75px"></td>
                <td>
                    <center>
                        <a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataPegawai/updateData/' . $p->id_pegawai); ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/dataPegawai/deleteData/' . $p->id_pegawai); ?>">
                            <i class="fas fa-trash"></i>
                        </a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>


</div>
<!-- /.container-fluid -->