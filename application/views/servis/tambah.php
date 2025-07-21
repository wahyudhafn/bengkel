<div class="content-wrapper">
    <section class="content-header"><h1><?php echo $title; ?></h1></section>
    <section class="content">
        <div class="card card-primary">
            <div class="card-header"><h3 class="card-title">Form Tambah Order Servis</h3></div>
            <div class="card-body">
                <?php echo form_open('servis/tambah'); ?>
                    <div class="form-group">
                        <label>Pelanggan*</label>
                        <select name="id_pelanggan" class="form-control">
                            <option value="">-- Pilih Pelanggan --</option>
                            <?php foreach($pelanggan as $p): ?><option value="<?php echo $p->id_pelanggan; ?>" <?php echo set_select('id_pelanggan', $p->id_pelanggan); ?>><?php echo $p->nama_pelanggan; ?></option><?php endforeach; ?>
                        </select>
                        <?php echo form_error('id_pelanggan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Montir*</label>
                        <select name="id_montir" class="form-control">
                            <option value="">-- Pilih Montir --</option>
                            <?php foreach($montir as $m): ?><option value="<?php echo $m->id_montir; ?>" <?php echo set_select('id_montir', $m->id_montir); ?>><?php echo $m->nama_montir; ?> (<?php echo $m->spesialisasi; ?>)</option><?php endforeach; ?>
                        </select>
                         <?php echo form_error('id_montir', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>No. Polisi Kendaraan*</label>
                        <input type="text" name="no_polisi" class="form-control" value="<?php echo set_value('no_polisi'); ?>">
                        <?php echo form_error('no_polisi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk*</label>
                        <input type="date" name="tanggal_masuk" class="form-control" value="<?php echo set_value('tanggal_masuk', date('Y-m-d')); ?>">
                        <?php echo form_error('tanggal_masuk', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Keluhan*</label>
                        <textarea name="keluhan" class="form-control" rows="3"><?php echo set_value('keluhan'); ?></textarea>
                        <?php echo form_error('keluhan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo site_url('servis'); ?>" class="btn btn-secondary">Batal</a>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</div>