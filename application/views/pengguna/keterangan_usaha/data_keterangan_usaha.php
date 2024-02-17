<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Surat</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Keterangan Keterangan Usaha</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="h3 float-left">Data Surat Keterangan Keterangan Usaha</h3>
                <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahModal">Tambah
                    data</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col table-responsive">
                        <table class="datatable table table-striped table-sm text-center table-borderd">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pemohon</th>
                                    <th>NIK pemohon</th>
                                    <th>Alamat</th>
                                    <th>TTL</th>
                                    <th>Alamat Usaha</th>
                                    <th>Nama Usaha</th>
                                    <th>Tanggal permohonan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n = 0;
                                foreach ($keterangan_usaha as $surat) :
                                    $n++; ?>
                                    <tr>
                                        <td>
                                            <?= $n ?>
                                        </td>
                                        <td>
                                            <?= $surat->nama ?>
                                        </td>
                                        <td>
                                            <?= $surat->nik_pemohon ?>
                                        </td>
                                        <td>
                                            DUSUN <?= $surat->dusun ?> RT. <?= $surat->rt ?> RW.<?= $surat->rw ?>
                                        </td>
                                        <td>
                                            <?= $surat->tempat_lahir ?>, <?= $surat->tanggal_lahir ?>
                                        </td>
                                        <td>
                                            <?= $surat->alamat_usaha ?>
                                        </td>
                                        <td>
                                            <?= $surat->nama_usaha ?>
                                        </td>
                                        <td>
                                            <?= $surat->created_at ?>
                                        </td>
                                        <td>
                                            <span class="badge badge-<?= bg_color($surat->status) ?>"><?= ucfirst($surat->status) ?></span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                            <?php if($surat->status=='proses'): ?>
                                                <a class="btn btn-sm btn-warning text-white" href="<?= site_url('pengguna/surat_keterangan_usaha/' . $surat->id_surat) ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <?php endif ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<!-- Tambah Modal  -->

<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('pengguna/add_surat_keterangan_usaha') ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nik">NIK Pemohon</label>
                            <input type="text" class="form-control" id="nik_pemohon" name="nik_pemohon" value="<?= $_SESSION['nik'] ?>" readonly>
                        </div>
                        <strong>Data pemohon</strong>
                        <table class="table table-sm">
                            <tr>
                                <th>Nama</th>
                                <td id="pemohon_nama"></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td id="pemohon_alamat"></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td id="pemohon_jenis_kelamin"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <button type="button" onclick="check_nik()" class="btn btn-sm mt-2 btn-info">Check!</button>
                <div class="form-group">
                    <label for="nama_usaha">Nama Usaha</label>
                    <input type="text" class="form-control" name="nama_usaha" required>
                </div>

                <div class="form-group">
                    <label for="alamat_usaha">Alamat Usaha</label>
                    <input type="text" class="form-control" name="alamat_usaha" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>


<script>
    function check_nik() {
        nik_pemohon = $('#nik_pemohon').val()
        url = '<?= site_url('check_nik') ?>';
        $.post(url, {
            nik: nik_pemohon
        }, function(data) {
            pemohon = data
            $('#pemohon_nama').html(pemohon.nama)
            $('#pemohon_alamat').html('DUSUN ' + pemohon.dusun + ' RT. ' + pemohon.rt + ' RW. ' + pemohon.rw)
            $('#pemohon_jenis_kelamin').html(pemohon.jenis_kelamin)
        })

        nik_termohon = $('#nik_termohon').val()
        url = '<?= site_url('check_nik') ?>';
        $.post(url, {
            nik: nik_termohon
        }, function(data) {
            console.log(data)
            termohon = data
            $('#termohon_nama').html(termohon.nama)
            $('#termohon_alamat').html('DUSUN ' + termohon.dusun + ' RT. ' + termohon.rt + ' RW. ' + termohon.rw)
            $('#termohon_jenis_kelamin').html(termohon.jenis_kelamin)
        })

    }

    function ganti_tujuan() {
        tujuan = $('#tujuan').val()
        form_org = $('#form-termohon')
        form_lembaga = $('#form-lembaga')

        // kosongkan data terlebih dahulu
        $('#nik_termohon').val('')
        $('#nama-lembaga').val('')
        $('#alamat-lembaga').val('')
        $('#termohon_nama').html('')
        $('#termohon_alamat').html('')
        $('#termohon_jenis_kelamin').html('')

        if (tujuan == 'orang lain') {
            form_lembaga.addClass('d-none')
            form_org.removeClass('d-none')
        } else if (tujuan == 'lembaga') {
            form_lembaga.removeClass('d-none')
            form_org.addClass('d-none')
        } else {
            form_lembaga.addClass('d-none')
            form_org.addClass('d-none')
        }
    }
</script>