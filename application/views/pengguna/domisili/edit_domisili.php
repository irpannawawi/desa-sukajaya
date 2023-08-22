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
                <h3 class="h3 float-left">Edit Surat Domisili</h3>
            </div>
            <div class="card-body">
                <?=form_open('pengguna/surat_domisili/edit')?>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nik">NIK Pemohon</label>
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
                    <div class="col-6 <?=$surat->tujuan=='orang lain'?'':'d-none'?>" id="form-termohon">

                        <div class="form-group">
                            <label for="nik">NIK Termohon</label>
                            <input type="text" class="form-control" id="nik_termohon" name="nik_termohon" value="<?=$surat->nik_termohon?>">
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
                    <label for="tujuan">Tujuan / Peruntukan</label>
                    <select name="tujuan" id="tujuan" class="form-control" onchange="ganti_tujuan()">
                        <option <?=$surat->tujuan=='sendiri'?'selected':''?> value="sendiri">Sendiri</option>
                        <option <?=$surat->tujuan=='orang lain'?'selected':''?> value="orang lain">Orang lain</option>
                        <option <?=$surat->tujuan=='lembaga'?'selected':''?> value="lembaga">Lembaga</option>
                    </select>
                </div>
                <div id="form-lembaga" class="<?=$surat->tujuan=='lembaga'?'':'d-none'?>">
                    <h4>Data lembaga</h4>
                    <div class="form-group">
                        <label for="nama_lembaga">Nama Lembaga</label>
                        <input type="text" value="<?=$surat->nama_lembaga?>" class="form-control" id="nama-lembaga" name="nama_lembaga">
                    </div>
                    <div class="form-group">
                        <label for="alamat_lembaga">Alamat Lembaga</label>
                        <textarea class="form-control" id="alamat-lembaga" name="alamat_lembaga"><?=$surat->alamat_lembaga?></textarea>
                    </div>
                </div>
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

    
    function ganti_tujuan()
        {
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

            if(tujuan == 'orang lain'){
                form_lembaga.addClass('d-none')
                form_org.removeClass('d-none')
            }else if(tujuan == 'lembaga'){
                form_lembaga.removeClass('d-none')
                form_org.addClass('d-none')
            }else{
                form_lembaga.addClass('d-none')
                form_org.addClass('d-none')
            }
        }
</script>