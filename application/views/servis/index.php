<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo $title; ?></h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $total_pelanggan; ?></h3>
                            <p>Total Pelanggan</p>
                        </div>
                        <div class="icon"><i class="fas fa-users"></i></div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $total_montir; ?></h3>
                            <p>Total Montir</p>
                        </div>
                        <div class="icon"><i class="fas fa-user-cog"></i></div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?php echo $servis_selesai; ?></h3>
                            <p>Servis Selesai</p>
                        </div>
                        <div class="icon"><i class="fas fa-check-circle"></i></div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $servis_dikerjakan; ?></h3>
                            <p>Servis Dikerjakan</p>
                        </div>
                        <div class="icon"><i class="fas fa-tools"></i></div>
                    </div>
                </div>
            </div>
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h4>Selamat Datang, <?php echo $this->session->userdata('nama_lengkap'); ?>!</h4>
                    <p>Anda telah login ke Sistem Informasi Bengkel. Gunakan menu di samping untuk mengelola data.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-chart-bar mr-1"></i>Grafik Servis Bulanan Tahun
                                <?php echo date('Y'); ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="monthlyServisChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Order Servis Terbaru</h3>
                    <div class="card-tools">
                        <a href="<?php echo site_url('servis/tambah'); ?>" class="btn btn-sm btn-primary">Tambah
                            Order</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>No Polisi</th>
                                    <th>Pelanggan</th>
                                    <th>Status</th>
                                    <th>Montir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (array_slice($servis_terbaru, 0, 7) as $servis): ?>
                                    <tr>
                                        <td><span class="badge badge-dark"><?php echo $servis->no_polisi; ?></span></td>
                                        <td><?php echo $servis->nama_pelanggan; ?></td>
                                        <td>
                                            <?php
                                            $status_class = 'badge-secondary';
                                            if ($servis->status == 'Dikerjakan')
                                                $status_class = 'badge-warning';
                                            if ($servis->status == 'Selesai')
                                                $status_class = 'badge-success';
                                            if ($servis->status == 'Diambil')
                                                $status_class = 'badge-primary';
                                            ?>
                                            <span
                                                class="badge <?php echo $status_class; ?>"><?php echo $servis->status; ?></span>
                                        </td>
                                        <td><?php echo $servis->nama_montir; ?></td>
                                        <td width="150">
                                            <a href="<?php echo site_url('servis/edit/' . $servis->id_servis); ?>"
                                                class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="<?php echo site_url('servis/hapus/' . $servis->id_servis); ?>"
                                                onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger"><i
                                                    class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <a href="<?php echo site_url('servis/daftar'); // Arahkan ke halaman daftar (lihat Opsi 2) ?>"
                        class="btn btn-sm btn-secondary float-right">Lihat Semua Order</a>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    //-------------
                    //- BAR CHART -
                    //-------------
                    var chartLabels = <?php echo $chart_labels; ?>;
                    var chartData = <?php echo $chart_data; ?>;

                    var barChartData = {
                        labels: chartLabels,
                        datasets: [
                            {
                                label: 'Jumlah Servis',
                                backgroundColor: 'rgba(60,141,188,0.9)',
                                borderColor: 'rgba(60,141,188,0.8)',
                                pointRadius: false,
                                pointColor: '#3b8bba',
                                pointStrokeColor: 'rgba(60,141,188,1)',
                                pointHighlightFill: '#fff',
                                pointHighlightStroke: 'rgba(60,141,188,1)',
                                data: chartData
                            },
                        ]
                    }

                    var barChartCanvas = document.getElementById('monthlyServisChart').getContext('2d');
                    var barChartOptions = {
                        responsive: true,
                        maintainAspectRatio: false,
                        datasetFill: false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    stepSize: 1
                                }
                            }]
                        }
                    }

                    new Chart(barChartCanvas, {
                        type: 'bar',
                        data: barChartData,
                        options: barChartOptions
                    })
                });
            </script>