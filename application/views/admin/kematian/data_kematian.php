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
                    <li class="breadcrumb-item active">Keterangan Kematian</li>
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
                <h3 class="h3 float-left">Data Surat Keterangan Kematian</h3>
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
                                    <th>Nama Termohon</th>
                                    <th>Tanggal Meninggal</th>
                                    <th>Tempat Meninggal</th>
                                    <th>Sebab</th>
                                    <th>Tanggal Permohonan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n = 0;
                                foreach ($kematian as $surat) :
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
                                            <?php
                                            $termohon = $this->db->where('nik', $surat->nik_termohon)->get('masyarakat')->result()[0];
                                            echo $termohon->nama
                                            ?>
                                        </td>
                                        <td>
                                            <?= $surat->tanggal_meninggal ?>
                                        </td>
                                        <td>
                                            <?= $surat->tempat_meninggal ?>
                                        </td>
                                        <td>
                                            <?= $surat->penyebab_meninggal ?>
                                        </td>
                                        <td>
                                            <?= $surat->created_at ?>
                                        </td>
                                        <td>
                                            <?php if ($surat->status == 'proses') : ?>
                                                <div class="btn-group">
                                                    <a class="btn btn-sm btn-success text-white" href="<?= site_url('admin/surat_kematian/status/terima/' . $surat->id_surat) ?>">
                                                        Terima
                                                    </a>
                                                    <a class="btn btn-sm btn-danger text-white" href="<?= site_url('admin/surat_kematian/status/tolak/' . $surat->id_surat) ?>">
                                                        Tolak
                                                    </a>
                                                </div>
                                            <?php else : ?>
                                                <span class="badge badge-<?= bg_color($surat->status) ?>"><?= ucfirst($surat->status) ?></span>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <?php if ($surat->status == 'selesai') : ?>
                                                <a class="btn btn-sm btn-info text-white" href="<?= site_url('download/surat_kematian/' . $surat->id_surat) ?>">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                                <?php endif ?>
                                                <a class="btn btn-sm btn-warning text-white" href="<?= site_url('admin/surat_kematian/' . $surat->id_surat) ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
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
            <?= form_open('admin/add_surat_kematian') ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nik">NIK Pemohon <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control" id="nik_pemohon" minlength="16" maxlength="16" name="nik_pemohon">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nik">NIK Termohon <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control" id="nik_termohon" minlength="16" maxlength="16" name="nik_termohon">
                        </div>
                    </div>
                </div>

                <button type="button" onclick="check_nik()" class="btn btn-sm mt-2 btn-info">Check!</button>
                <div class="row">
                    <div class="col-6">
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
                    <div class="col-6">
                        <strong>Data termohon</strong>
                        <table class="table table-sm">
                            <tr>
                                <th>Nama</th>
                                <td id="termohon_nama"></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td id="termohon_alamat"></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td id="termohon_jenis_kelamin"></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <label for="tanggal_meninggal">Tanggal Meninggal</label>
                    <input type="date" class="form-control" name="tanggal_meninggal">
                </div>
                <div class="form-group">
                    <label for="tempat_meninggal">Tempat Meninggal</label>
                    <input type="text" class="form-control" name="tempat_meninggal">
                </div>
                <div class="form-group">
                    <label for="penyebab_meninggal">Penyebab Meninggal</label>
                    <input type="text" class="form-control" name="penyebab_meninggal">
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
</script>