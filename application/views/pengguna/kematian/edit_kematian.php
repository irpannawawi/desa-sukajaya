<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Master data</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Warga</li>
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
                <h3 class="h3 float-left">Edit Surat kematian</h3>
                    data</button>
            </div>
            <div class="card-body">
                <?=form_open('pengguna/surat_kematian/edit')?>
            <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nik">NIK Pemohon</label>
                            <input type="text" class="form-control" id="nik_pemohon" name="nik_pemohon" value="<?=$surat->nik_pemohon?>" readonly>
                            <input type="hidden" name="id_surat" value="<?=$surat->id_surat?>" >
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
                    <div class="col-6">

                        <div class="form-group">
                            <label for="nik">NIK Termohon</label>
                            <input type="text" class="form-control" id="nik_termohon" name="nik_termohon" value="<?=$surat->nik_termohon?>" readonly>
                        </div>
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
                <button type="button" onclick="check_nik()" class="btn btn-sm mt-2 btn-info">Check!</button>
                <hr>
                <div class="form-group">
                    <label for="tanggal_meninggal">Tanggal Meninggal</label>
                    <input type="text" class="form-control" value="<?=$surat->tanggal_meninggal?>" name="tanggal_meninggal">
                </div>
                <div class="form-group">
                    <label for="tempat_meninggal">Tempat Meninggal</label>
                    <input type="text" class="form-control" value="<?=$surat->tempat_meninggal?>" name="tempat_meninggal">
                </div>
                <div class="form-group">
                    <label for="penyebab_meninggal">Penyebab Meninggal</label>
                    <input type="text" class="form-control" value="<?=$surat->penyebab_meninggal?>" name="penyebab_meninggal">
                </div>
                <div class="form-group">
                    <input type="submit" value="Simpan" class="btn btn-success">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<script>
    function check_nik() {
        nik_pemohon = $('#nik_pemohon').val()
        url = '<?=site_url('check_nik')?>';
        $.post(url, { nik: nik_pemohon }, function (data) {
            pemohon = data
            $('#pemohon_nama').html(pemohon.nama)
            $('#pemohon_alamat').html('DUSUN ' + pemohon.dusun + ' RT. ' + pemohon.rt + ' RW. ' + pemohon.rw)
            $('#pemohon_jenis_kelamin').html(pemohon.jenis_kelamin)
        })

        nik_termohon = $('#nik_termohon').val()
        url = '<?=site_url('check_nik')?>';
        $.post(url, { nik: nik_termohon }, function (data) {
            console.log(data)
            termohon = data
            $('#termohon_nama').html(termohon.nama)
            $('#termohon_alamat').html('DUSUN ' + termohon.dusun + ' RT. ' + termohon.rt + ' RW. ' + termohon.rw)
            $('#termohon_jenis_kelamin').html(termohon.jenis_kelamin)
        })

    }
</script>