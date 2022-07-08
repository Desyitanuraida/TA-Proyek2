<link rel="stylesheet" href="<?= base_url('public/assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('public/assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<div class="row">
    <div class="col-md-12">
        <?= $this->session->flashdata("mess") ?>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-left" style="padding-top: 8px;">
                    Daftar
                </h3>
                <a href="<?= base_url('admin/mobil/form') ?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>No Polisi</th>
                            <th>Warna</th>
                            <th>Biaya Sewa</th>
                            <th>CC / Tahun</th>
                            <th>Merk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) : ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?= $value->nopol ?></td>
                                <td><?= $value->warna ?></td>
                                <td><?= $value->biaya_sewa ?></td>
                                <td><?= $value->cc ?> / <?= $value->tahun ?></td>
                                <td><?= $value->nama_merk ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('admin/mobil/sewa/'.$value->id) ?>" class="btn btn-secondary"><i class="fa fa-money-bill"></i></a>
                                    <a href="<?= base_url('admin/mobil/form/'.$value->id) ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('admin/mobil/delete/'.$value->id) ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<script src="<?= base_url('public/assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('public/assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $("#example1").DataTable({
        "ordering": false,
    });
</script>