<!--profiles start -->
<section id="profiles" class="profiles" style="padding-bottom: 10px;">
    <div class="section-heading text-center">
        <h2>Informasi Jumlah Penduduk</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa fa-users fa-5x mb-3"></i>
                        <h5 class="card-title"><?= $jumlah_pengguna ?></h5>
                        <p class="card-text">Jumlah Masyarakat</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa fa-user fa-5x mb-3"></i>
                        <h5 class="card-title"><?= $gender['laki-laki'] ?></h5>
                        <p class="card-text">Jumlah Laki-laki</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa fa-female fa-5x mb-3"></i>
                        <h5 class="card-title"><?= $gender['perempuan'] ?></h5>
                        <p class="card-text">Jumlah Perempuan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/.profiles-->
<!--profiles end -->

<section style="margin-top: 20px;">
    <div class="text-center">
        <p style="font-size: 25px; font-weight:600; ">Informasi Jumlah Surat-surat terbit</p>
    </div>
    <div class="col-lg-7 col-md-8 col-sm-12 mx-auto mt-2 p-3">
        <canvas id="suratChart"></canvas>
    </div>
</section>

<!--contact start -->
<section id="contact" class="contact" style="padding:0px;">

    <div class="container">
        <div class="contact-content">
            <h1>Cari</h1>
            <div class="row">
                <div class="">
                    <div class="single-contact-box" style="padding-top: 15px;">
                        <div class="contact-form">
                            <form method="GET" action="<?= site_url('informasi') ?>">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="search" name="keyword" class="form-control" id="search" placeholder="Cari data masyarakat">
                                        </div><!--/.form-group-->
                                    </div><!--/.col-->
                                </div><!--/.row-->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="single-contact-btn">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                        </div><!--/.single-single-contact-btn-->
                                    </div><!--/.col-->
                                </div><!--/.row-->
                            </form><!--/form-->
                        </div><!--/.contact-form-->
                    </div><!--/.single-contact-box-->
                </div><!--/.col-->
            </div><!--/.row-->
        </div><!--/.contact-content-->
    </div><!--/.container-->
</section><!--/.contact-->
<!--contact end -->

<?php if (!empty($search_result)) { ?>
    <!--about start -->
    <section id="about" class="about" style="padding: 20px 0px 10px;">
        <div class="text-center" style="padding-bottom:0px">
            <h2>Hasil</h2>
        </div>
        <div class="container">
            <div class="mt-3 p-2" style="margin-top: 10px;">
                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                            </tr>
                            <?php $n = 0;
                            foreach ($search_result['masyarakat'] as $masyarakat) { ?>
                                <tr>
                                    <td><?= ++$n ?></td>
                                    <td><?= $masyarakat->nama ?></td>
                                    <td><?= $masyarakat->jenis_kelamin ?></td>
                                    <td>Dusun <?= $masyarakat->dusun ?> RT. <?= $masyarakat->rt ?> RW. <?= $masyarakat->rw ?> Desa <?= $masyarakat->desa ?> Kecamatan <?= $masyarakat->kecamatan ?> Kabupaten <?= $masyarakat->kabupaten ?></td>
                                </tr>
                            <?php } //endforeach 
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/.about-->
    <!--about end -->
<?php } // endif 
?>

<script>
    // Data jumlah surat (contoh)
    var dataSurat = {
        labels: ["Surat Kematian", "Surat Keterangan Usaha", "Surat Keterangan Domisili", "Surat Keterangan Kelakuan Baik"],
        datasets: [{
            label: 'Data Surat',
            data: [<?= $jumlah_kematian ?>, <?= $jumlah_keterangan_usaha ?>, <?= $jumlah_domisili ?>, <?= $jumlah_kelakuan_baik ?>], // Gantilah ini dengan data yang sesuai
            backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)'],
            borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)'],
            borderWidth: 1
        }]
    };

    // Konfigurasi grafik
    var chartOptions = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    // Inisialisasi grafik
    var ctx = document.getElementById('suratChart').getContext('2d');
    var suratChart = new Chart(ctx, {
        type: 'bar',
        data: dataSurat,
        options: chartOptions
    });
</script>