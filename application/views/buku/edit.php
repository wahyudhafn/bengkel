<div class="content-wrapper">
    <section class="content-header"><h1><?php echo $title; ?></h1></section>
    <section class="content">
        <div class="card">
            <div class="card-body">
                <?php echo form_open('buku/edit/'.$buku->id_buku); ?>
                    <input type="hidden" name="id" value="<?php echo $buku->id_buku; ?>">
                    <div class="form-group">
                        <label>Judul Buku*</label>
                        <input type="text" name="judul_buku" class="form-control" value="<?php echo $buku->judul_buku; ?>">
                        <?php echo form_error('judul_buku', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Pengarang*</label>
                        <input type="text" name="pengarang" class="form-control" value="<?php echo $buku->pengarang; ?>">
                        <?php echo form_error('pengarang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit*</label>
                        <input type="number" name="tahun_terbit" class="form-control" value="<?php echo $buku->tahun_terbit; ?>">
                        <?php echo form_error('tahun_terbit', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?php echo site_url('buku'); ?>" class="btn btn-secondary">Batal</a>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</div>