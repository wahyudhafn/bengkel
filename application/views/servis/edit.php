<div class="content-wrapper">
    <section class="content-header"><h1><?php echo $title; ?></h1></section>
    <section class="content">
        <div class="card card-primary">
            <div class="card-header"><h3 class="card-title">Form Edit Order Servis</h3></div>
            <div class="card-body">
                <?php echo form_open('servis/edit/'.$servis->id_servis); ?>
                    <input type="hidden" name="id" value="<?php echo $servis->id_servis; ?>">
                    <div class="form-group">
                        <label>Pelanggan*</label>
                        <select name="id_pelanggan" class="form-control">
                            <?php foreach($pelanggan as $p): ?>
                                <option value="<?php echo $p->id_pelanggan; ?>" <?php echo ($p->id_pelanggan == $servis->id_pelanggan) ? 'selected' : ''; ?>>
                                    <?php echo $p->nama_pelanggan; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Montir*</label>
                        <select name="id_montir" class="form-control">
                           <?php foreach($montir as $m): ?>
                                <option value="<?php echo $m->id_montir; ?>" <?php echo ($m->id_montir == $servis->id_montir) ? 'selected' : ''; ?>>
                                    <?php echo $m->nama_montir; ?> (<?php echo $m->spesialisasi; ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>No. Polisi Kendaraan*</label>
                        <input type="text" name="no_polisi" class="form-control" value="<?php echo $servis->no_polisi; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk*</label>
                        <input type="date" name="tanggal_masuk" class="form-control" value="<?php echo $servis->tanggal_masuk; ?>">
                    </div>
                    <div class="form-group">
                        <label>Keluhan*</label>
                        <textarea name="keluhan" class="form-control" rows="3"><?php echo $servis->keluhan; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status*</label>
                        <select name="status" class="form-control">
                            <option value="Antrian" <?php echo ($servis->status == 'Antrian') ? 'selected' : ''; ?>>Antrian</option>
                            <option value="Dikerjakan" <?php echo ($servis->status == 'Dikerjakan') ? 'selected' : ''; ?>>Dikerjakan</option>
                            <option value="Selesai" <?php echo ($servis->status == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                            <option value="Diambil" <?php echo ($servis->status == 'Diambil') ? 'selected' : ''; ?>>Diambil</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?php echo site_url('servis'); ?>" class="btn btn-secondary">Batal</a>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</div>