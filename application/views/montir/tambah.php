<div class="content-wrapper">
    <section class="content-header"><h1><?php echo $title; ?></h1></section>
    <section class="content">
        <div class="card card-primary">
            <div class="card-header"><h3 class="card-title">Form Tambah Montir</h3></div>
            <div class="card-body">
                <?php echo form_open('montir/tambah'); ?>
                    <div class="form-group">
                        <label>Nama Montir*</label>
                        <input type="text" name="nama_montir" class="form-control" value="<?php echo set_value('nama_montir'); ?>">
                        <?php echo form_error('nama_montir', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Spesialisasi*</label>
                        <input type="text" name="spesialisasi" class="form-control" value="<?php echo set_value('spesialisasi'); ?>">
                        <?php echo form_error('spesialisasi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo site_url('montir'); ?>" class="btn btn-secondary">Batal</a>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</div>