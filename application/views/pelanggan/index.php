<div class="content-wrapper">
    <section class="content-header"><div class="container-fluid"><h1><?php echo $title; ?></h1></div></section>
    <section class="content">
        <div class="card">
            <div class="card-header"><a href="<?php echo site_url('pelanggan/tambah'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pelanggan</a></div>
            <div class="card-body">
                <?php echo $this->session->flashdata('message'); ?>
                <table class="table table-bordered table-striped">
                    <thead><tr><th>No</th><th>Nama Pelanggan</th><th>Telepon</th><th>Alamat</th><th>Aksi</th></tr></thead>
                    <tbody>
                        <?php $no=1; foreach ($pelanggan as $item): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $item->nama_pelanggan; ?></td>
                            <td><?php echo $item->telepon; ?></td>
                            <td><?php echo $item->alamat; ?></td>
                            <td width="150">
                                <a href="<?php echo site_url('pelanggan/edit/'.$item->id_pelanggan); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?php echo site_url('pelanggan/hapus/'.$item->id_pelanggan); ?>" onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>