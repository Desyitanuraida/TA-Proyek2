<div class="row">
    <div class="col-md-12">
        <?= $this->session->flashdata("mess") ?>
    </div>
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form <?= $detail ? 'Ubah' : 'Tambah' ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Merk</label>
                        <select name="merk" id="merk" class="form-control">
                            <?php foreach ($merk as $key => $value) :
                            $selected = $detail ? ($value->id === $detail->merk_id ? 'selected' : '') : '';
                            ?>
                            <option value="<?=$value->id?>" <?=$selected?>><?=$value->nama?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nopol">No Polisi</label>
                        <input type="text" class="form-control" name="nopol" id="nopol" value="<?=$detail ? $detail->nopol : ''?>" placeholder="Masukkan No Polisi">
                    </div>
                    <div class="form-group">
                        <label for="warna">Warna</label>
                        <input type="text" class="form-control" name="warna" id="warna" value="<?=$detail ? $detail->warna : ''?>" placeholder="Masukkan Warna">
                    </div>
                    <div class="form-group">
                        <label for="biaya_sewa">Biaya Sewa</label>
                        <input type="text" class="form-control w-50" name="biaya_sewa" id="biaya_sewa" value="<?=$detail ? $detail->biaya_sewa : ''?>" placeholder="Masukkan Biaya Sewa">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?=$detail ? $detail->deskripsi : ''?>" placeholder="Masukkan Deskripsi">
                    </div>
                    <div class="form-group">
                        <label for="cc">CC</label>
                        <input type="number" class="form-control" name="cc" id="cc" value="<?=$detail ? $detail->cc : ''?>" placeholder="Masukkan CC">
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="number" class="form-control" name="tahun" id="tahun" value="<?=$detail ? $detail->tahun : ''?>" placeholder="Masukkan Tahun">
                    </div>
                    <div class="form-group">
                        <label for="foto1">Foto</label>
                        <input type="file" class="d-block" name="foto" id="foto" accept="image/*">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer float-right">
                    <a href="<?= base_url('admin/mobil') ?>" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i></a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>