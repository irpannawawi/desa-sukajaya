<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah <br><?=$_SESSION['role']=='admin'?'Masyarakat':'Keluarga' ?></span>
                        <span class="info-box-number"><?= $_SESSION['role']=='admin'?$jumlah_pengguna:$jumlah_keluarga ?></span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Kematian</span>
                        <span class="info-box-number"><?= $jumlah_kematian ?></span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Domisili</span>
                        <span class="info-box-number"><?= $jumlah_domisili ?></span>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Kelakuan Baik</span>
                        <span class="info-box-number"><?= $jumlah_kelakuan_baik ?></span>
                    </div>
                </div>
            </div>


            <div class="col-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Usaha</span>
                        <span class="info-box-number"><?= $jumlah_keterangan_usaha ?></span>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header"><h3>Grafik Masyarakat</h3></div>
                    <div class="card-body">
                        <canvas id="masyarakatChart"></canvas>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header"><h3>Grafik Jumlah Surat</h3></div>
                    <div class="card-body">
                        <canvas id="suratChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

<script>
    // Data jumlah surat (contoh)
    var dataSurat = {
        labels: ["Jumlah Laki-laki", "Jumlah Perempuan"],
        datasets: [{
            label: 'Data Surat',
            data: [<?= $gender['laki-laki'] ?>, <?= $gender['perempuan'] ?>], // Gantilah ini dengan data yang sesuai
            backgroundColor: ['rgba(54, 162, 235, 0.2)','rgba(75, 192, 192, 0.2)'],
            borderColor: ['rgba(54, 162, 235, 1)','rgba(75, 192, 192, 1)'],
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
    var ctx = document.getElementById('masyarakatChart').getContext('2d');
    var suratChart = new Chart(ctx, {
        type: 'pie',
        data: dataSurat,
        options: chartOptions
    });
</script>