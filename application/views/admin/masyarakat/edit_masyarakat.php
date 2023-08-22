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
                <h3 class="h3 float-left">Data Warga</h3>
                <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahModal">Tambah
                    data</button>
            </div>
            <div class="card-body">
                <form method="POST" action="<?=site_url('admin/masyarakat/update')?>">
                    <div class="row">
                        <!-- Kolom 1 -->
                        <div class="col">
                            <div class="form-group">
                                <label for="nama">Nama <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" value="<?=$masyarakat->nama?>" name="nama" id="nama" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="nik">N I K <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" value="<?=$masyarakat->nik?>" name="nik" id="nik" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir <sup class="text-danger">*</sup></label>
                                <input type="text"  class="form-control" value="<?=$masyarakat->tempat_lahir?>" name="tempat_lahir" id="tempat_lahir" >
                            </div>
            
                            
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir <sup class="text-danger">*</sup></label>
                                <input type="text"  class="form-control" value="<?=$masyarakat->tanggal_lahir?>" name="tanggal_lahir" id="tanggal_lahir" >
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Jenis kelamin <sup class="text-danger">*</sup></label>
                                <select value="<?=$masyarakat->jenis_kelamin?>" name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
    
                            
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input type="text"  class="form-control" value="<?=$masyarakat->agama?>" name="agama" id="agama" value="Islam">
                            </div>
                            
                            <div class="form-group">
                                <label for="status_perkawinan">Status Perkawinan</label>
                                <input type="text"  class="form-control" value="<?=$masyarakat->status_perkawinan?>" name="status_perkawinan" id="status_perkawinan" >
                            </div>
    
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text"  class="form-control" value="<?=$masyarakat->pekerjaan?>" name="pekerjaan" id="pekerjaan" >
                            </div>
                            
                            <div class="form-group">
                                <label for="gol_darah">Golongan Darah</label>
                                <input type="text"  class="form-control" value="<?=$masyarakat->gol_darah?>" name="gol_darah" id="gol_darah" >
                            </div>
                        </div>
    
                        <!-- kolom 2 -->
                        <div class="col">
                            <div class="form-group">
                                <label for="dusun">Dusun</label>
                                <select name="dusun" id="dusun" class="form-control">
                                    <option <?=$masyarakat->dusun=='Betuksari'?'selected':''?> value="Betuksari">Betuksari</option>
                                    <option <?=$masyarakat->dusun=='Citapen Landeuh'?'selected':''?> value="Citapen Landeuh">Citapen Landeuh</option>
                                    <option <?=$masyarakat->dusun=='Citapen Pasir'?'selected':''?> value="Citapen Pasir">Citapen Pasir</option>
                                    <option <?=$masyarakat->dusun=='Jamuresi'?'selected':''?> value="Jamuresi">Jamuresi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="rt">RT</label>
                                <input type="text"  class="form-control" value="<?=$masyarakat->rt?>" name="rt" id="rt" placeholder="000">
                            </div>
                            <div class="form-group">
                                <label for="rw">RW</label>
                                <input type="text"  class="form-control" value="<?=$masyarakat->rw?>" name="rw" id="rw" placeholder="000">
                            </div>
                            <div class="form-group">
                                <label for="desa">Desa</label>
                                <input type="text"  class="form-control" value="<?=$masyarakat->desa?>" name="desa" id="desa" readonly value="Sukajaya">
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text"  class="form-control" value="<?=$masyarakat->kecamatan?>" name="kecamatan" id="kecamatan" readonly value="Rajadesa">
                            </div>
                            <div class="form-group">
                                <label for="kabupaten">Kabupaten</label>
                                <input type="text"  class="form-control" value="<?=$masyarakat->kabupaten?>" name="kabupaten" id="kabupaten" readonly value="Ciamis">
                            </div>
                        </div>
                    
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

