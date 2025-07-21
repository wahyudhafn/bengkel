<div class="content-wrapper">
    <section class="content-header"><div class="container-fluid"><h1><?php echo $title; ?></h1></div></section>
    <section class="content">
        <div class="card">
            <div class="card-header"><a href="<?php echo site_url('montir/tambah'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Montir</a></div>
            <div class="card-body">
                <?php echo $this->session->flashdata('message'); ?>
                <table class="table table-bordered table-striped">
                    <thead><tr><th>No</th><th>Nama Montir</th><th>Spesialisasi</th><th>Aksi</th></tr></thead>
                    <tbody>
                        <?php $no=1; foreach ($montir as $item): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $item->nama_montir; ?></td>
                            <td><?php echo $item->spesialisasi; ?></td>
                            <td width="150">
                                <a href="<?php echo site_url('montir/edit/'.$item->id_montir); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?php echo site_url('montir/hapus/'.$item->id_montir); ?>" onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>