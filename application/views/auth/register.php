<div class="card mt-5 col-8 mx-auto">
    <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="<?=site_url('register_member')?>" method="post">
            <div class="row">
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password"
                            name="confirm_password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    

                    
                </div>
                <div class="col">
                <div class="input-group mb-3">
                        <input type="text" class="form-control" onkeyup="check_nik()" placeholder="NIK" name="nik" id="nik">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
                            </div>
                        </div>
                    </div>

                    
                <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="NO KK" name="no_kk" id="no_kk">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-users"></span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama">
                    </div>
                    
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat lahir</label>
                        <input type="text"  class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" id="tempat_lahir" >
                    </div>
    
                    
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="text"  class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" id="tanggal_lahir" >
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Jenis kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- /.col -->
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="<?=site_url('login')?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div><!-- /.card -->

<script>
    function check_nik() {
        nik_pemohon = $('#nik').val()
        url = '<?=site_url('authenticate/check_nik')?>';
        $.post(url, { nik: nik_pemohon }, function (data) {
            pemohon = data
            $('#nama').val(pemohon.nama)
            $('#tempat_lahir').val(pemohon.tempat_lahir)
            $('#tanggal_lahir').val(pemohon.tanggal_lahir)
            $('#jenis_kelamin').val(pemohon.jenis_kelamin)
            $('#agama').val(pemohon.agama)
            $('#status_perkawinan').val(pemohon.status_perkawinan)
            $('#pekerjaan').val(pemohon.pekerjaan)
            $('#dusun').val(pemohon.dusun).change()
            $('#rt').val(pemohon.rt)
            $('#rw').val(pemohon.rw)
            console.log(pemohon)
        })
    }
</script>