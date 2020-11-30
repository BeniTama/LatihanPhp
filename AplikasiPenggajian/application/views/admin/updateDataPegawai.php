<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- Content Row -->
    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">
            <?php foreach ($pegawai as $p) : ?>
                <form method="POST" action="<?= base_url('admin/dataPegawai/updateData_action'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id_pegawai" class="form-control" value="<?= $p->id_pegawai; ?>">
                        <label>NIK</label>
                        <input type="number" name="nik" class="form-control" value="<?= $p->nik; ?>">
                        <?= form_error('nik', '<div class="text-small text-danger"></div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" name="nama_pegawai" class="form-control" value="<?= $p->nama_pegawai; ?>">
                        <?= form_error('nama_pegawai', '<div class="text-small text-danger"></div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="<?= $p->jenis_kelamin; ?>"><?= $p->jenis_kelamin; ?></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin', '<div class="text-small text-danger"></div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan" class="form-control">
                            <option value="<?= $p->jabatan; ?>"><?= $p->jabatan; ?></option>
                            <?php foreach ($jabatan as $j) : ?>
                                <option value="<?= $j->nama_jabatan; ?>"><?= $j->nama_jabatan; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('jabatan', '<div class="text-small text-danger"></div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" class="form-control" value="<?= $p->tanggal_masuk; ?>">
                        <?= form_error('tanggal_masuk', '<div class="text-small text-danger"></div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="<?= $p->status; ?>"><?= $p->id_pegawai; ?></option>
                            <option value="Pegawai Tetap">Pegawai Tetap</option>
                            <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                        </select>
                        <?= form_error('status', '<div class="text-small text-danger"></div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->