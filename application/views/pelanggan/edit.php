<div class="content-wrapper">
    <section class="content-header"><h1><?php echo $title; ?></h1></section>
    <section class="content">
        <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Form Edit Pelanggan</h3></div>
        <div class="card-body">
            <?php echo form_open('pelanggan/edit/'.$pelanggan->id_pelanggan); ?>
                <input type="hidden" name="id" value="<?php echo $pelanggan->id_pelanggan; ?>">
                <div class="form-group">
                    <label>Nama Pelanggan*</label>
                    <input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $pelanggan->nama_pelanggan; ?>">
                    <?php echo form_error('nama_pelanggan', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon*</label>
                    <input type="text" name="telepon" class="form-control" value="<?php echo $pelanggan->telepon; ?>">
                    <?php echo form_error('telepon', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Alamat*</label>
                    <textarea name="alamat" class="form-control"><?php echo $pelanggan->alamat; ?></textarea>
                    <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?php echo site_url('pelanggan'); ?>" class="btn btn-secondary">Batal</a>
            <?php echo form_close(); ?>
        </div>
        </div>
    </section>
</div>