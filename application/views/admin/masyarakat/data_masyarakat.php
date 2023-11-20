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
                <div class="row">
                    <div class="col table-responsive">
                        <table class="datatable table table-striped table-sm text-center table-borderd">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>KK</th>
                                    <th>Alamat</th>
                                    <th>Tempat/Tgl. Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pekerjaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n = 0;
                                foreach ($masyarakat as $warga):
                                    $n++; ?>
                                    <tr>
                                        <td>
                                            <?= $n ?>
                                        </td>
                                        <td><?= $warga->nama ?></td>
                                        <td><?= $warga->nik ?></td>
                                        <td><?= $warga->no_kk ?></td>
                                        <td>
                                            Dsn. <?=$warga->dusun?> RT. <?=$warga->rt?> RW. <?=$warga->rw?> 
                                        </td>
                                        <td><?= $warga->tempat_lahir ?>, <?=$warga->tanggal_lahir?></td>
                                        <td><?= $warga->jenis_kelamin ?></td>
                                        <td><?= $warga->pekerjaan ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a 
                                                    class="btn btn-sm btn-warning text-white" 
                                                    href="<?= site_url('admin/masyarakat/'.$warga->nik) ?>"
                                                    >
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-sm btn-danger"
                                                    href="<?= site_url('admin/masyarakat/delete/' . $warga->nik) ?>"
                                                    onclick="return confirm('Hapus data?')">
                                                    <i class="fa fa-trash"></i>
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
            <?= form_open('admin/add_masyarakat') ?>
            <div class="modal-body">
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
                            <input type="text"  class="form-control" name="tempat_lahir" id="tempat_lahir" required>
                        </div>
        
                        
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir <sup class="text-danger">*</sup></label>
                            <input type="text"  class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
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
                            <input type="text"  class="form-control" name="agama" id="agama" value="Islam">
                        </div>
                        
                        <div class="form-group">
                            <label for="status_perkawinan">Status Perkawinan</label>
                            <input type="text"  class="form-control" name="status_perkawinan" id="status_perkawinan" >
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text"  class="form-control" name="pekerjaan" id="pekerjaan" >
                        </div>
                        
                        <div class="form-group">
                            <label for="gol_darah">Golongan Darah</label>
                            <input type="text"  class="form-control" name="gol_darah" id="gol_darah" >
                        </div>
                    </div>

                    <!-- kolom 2 -->
                    <div class="col">
                        <div class="form-group">
                            <label for="dusun">Dusun</label>
                            <input name="dusun" id="dusun" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="text"  class="form-control" name="rt" id="rt" placeholder="000">
                        </div>
                        <div class="form-group">
                            <label for="rw">RW</label>
                            <input type="text"  class="form-control" name="rw" id="rw" placeholder="000">
                        </div>
                        <div class="form-group">
                            <label for="desa">Desa</label>
                            <input type="text"  class="form-control" name="desa" id="desa"  value="Sukajaya">
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text"  class="form-control" name="kecamatan" id="kecamatan"  value="Rajadesa">
                        </div>
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <input type="text"  class="form-control" name="kabupaten" id="kabupaten"  value="Ciamis">
                        </div>
                    </div>
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

<!-- Edit Modal  -->

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('admin/edit_admin') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="edit-username" autocomplete="off">
                    <input type="hidden"  name="uid" id="edit-uid" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="edit-email" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="edit-password">
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
    function fill_edit(uid, username, email){
        $('#edit-uid').val(uid)
        $('#edit-username').val(username)
        $('#edit-email').val(email)
    }
</script>