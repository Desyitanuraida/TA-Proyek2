<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form <?=$detail ? 'Ubah' : 'Tambah'?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Mobil</label>
                        <select name="mobil" id="mobil" class="form-control">
                            <?php foreach ($mobil as $key => $value) :
                            $selected = $detail ? ($value->id === $detail->mobil_id ? 'selected' : '') : '';
                            ?>
                            <option value="<?=$value->id?>" <?=$selected?>><?=$value->nopol?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Jenis Perawatan</label>
                        <select name="jenis_perawatan" id="jenis_perawatan" class="form-control">
                            <?php foreach ($jenis_perawatan as $key => $value) :
                            $selected = $detail ? ($value->id === $detail->jenis_perawatan_id ? 'selected' : '') : '';
                            ?>
                            <option value="<?=$value->id?>" <?=$selected?>><?=$value->nama?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?=$detail ? $detail->tanggal : ''?>" placeholder="Masukkan nama">
                    </div>
                    <div class="form-group">
                        <label for="biaya">Biaya</label>
                        <input type="text" class="form-control" name="biaya" id="biaya" value="<?=$detail ? $detail->biaya : ''?>" placeholder="Masukkan biaya">
                    </div>
                    <div class="form-group">
                        <label for="km_mobil">KM Mobil</label>
                        <input type="text" class="form-control" name="km_mobil" id="km_mobil" value="<?=$detail ? $detail->km_mobil : ''?>" placeholder="Masukkan KM Mobil">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?=$detail ? $detail->deskripsi : ''?>" placeholder="Masukkan deskripsi">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer float-right">
                    <a href="<?= base_url('admin/perawatan') ?>" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i></a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>