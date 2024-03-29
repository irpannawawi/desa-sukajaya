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
                                    <th>Alamat</th>
                                    <th>TTL</th>
                                    <th>Alamat Usaha</th>
                                    <th>Nama Usaha</th>
                                    <th>Tanggal permohonan</th>
                                    <th>Status</th>
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
            <?= form_open('public/add_surat_keterangan_usaha') ?>
            <div class="modal-body">

                <div class="row">
                    <div class="col-12">
                        <strong>Data pemohon</strong>
                        <div class="row">
                            <!-- Kolom 1 -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="nama">Nama <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="nama" id="nama" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="nik">N I K <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="nik" id="nik" autocomplete="off" maxlength="16" minlength="16" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_kk">No KK <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="no_kk" id="no_kk" autocomplete="off" maxlength="16" minlength="16" required>
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
                                </div>


                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Jenis kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" class="form-control" name="agama" id="agama" value="Islam">
                                </div>

                                <div class="form-group">
                                    <label for="status_perkawinan">Status Perkawinan</label>
                                    <input type="text" class="form-control" name="status_perkawinan" id="status_perkawinan">
                                </div>

                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
                                </div>

                                <div class="form-group">
                                    <label for="gol_darah">Golongan Darah</label>
                                    <input type="text" class="form-control" name="gol_darah" id="gol_darah">
                                </div>
                            </div>

                            <!-- kolom 2 -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="dusun">Dusun</label>
                                    <input name="dusun" id="dusun" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="rt">RT</label>
                                    <input type="text" class="form-control" name="rt" id="rt" placeholder="000" required>
                                </div>
                                <div class="form-group">
                                    <label for="rw">RW</label>
                                    <input type="text" class="form-control" name="rw" id="rw" placeholder="000" required>
                                </div>
                                <div class="form-group">
                                    <label for="desa">Desa</label>
                                    <input type="text" class="form-control" name="desa" id="desa" value="Sukajaya" required>
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="Rajadesa" required>
                                </div>
                                <div class="form-group">
                                    <label for="kabupaten">Kabupaten</label>
                                    <input type="text" class="form-control" name="kabupaten" id="kabupaten" value="Ciamis" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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