<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1><?php echo $title; ?></h1></div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header"><a href="<?php echo site_url('buku/tambah'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Buku</a></div>
            <div class="card-body">
                <?php echo $this->session->flashdata('message'); ?>
                <table class="table table-bordered table-striped">
                    <thead><tr><th>No</th><th>Judul Buku</th><th>Pengarang</th><th>Tahun</th><th>Aksi</th></tr></thead>
                    <tbody>
                        <?php $no=1; foreach ($buku as $item): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $item->judul_buku; ?></td>
                            <td><?php echo $item->pengarang; ?></td>
                            <td><?php echo $item->tahun_terbit; ?></td>
                            <td width="150">
                                <a href="<?php echo site_url('buku/edit/'.$item->id_buku); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?php echo site_url('buku/hapus/'.$item->id_buku); ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>