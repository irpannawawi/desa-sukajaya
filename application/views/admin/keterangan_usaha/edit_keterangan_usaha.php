<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data surat</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Surat Kelakuan Baik</li>
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
                <h3 class="h3 float-left">Edit Surat Kelakuan Baik</h3>
            </div>
            <div class="card-body">
                <?=form_open('admin/surat_keterangan_usaha/edit')?>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nik">NIK Pemohon <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control" id="nik_pemohon" name="nik_pemohon" value="<?=$surat->nik_pemohon?>">
                            <input type="hidden" name="id_surat" value="<?=$surat->id_surat?>">
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
                    <input type="text" class="form-control" value="<?=$surat->nama_usaha?>" name="nama_usaha" required>
                </div>
                <hr>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<script defer>
    function check_nik() {
        nik_pemohon = $('#nik_pemohon').val()
        url = '<?=site_url('check_nik')?>';
        $.post(url, { nik: nik_pemohon }, function (data) {
            pemohon = data
            $('#pemohon_nama').html(pemohon.nama)
            $('#pemohon_alamat').html('DUSUN ' + pemohon.dusun + ' RT. ' + pemohon.rt + ' RW. ' + pemohon.rw)
            $('#pemohon_jenis_kelamin').html(pemohon.jenis_kelamin)
        })

    }

</script>