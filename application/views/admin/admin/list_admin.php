<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Admin</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Admin</li>
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
                <h3 class="h3 float-left">Data Admin</h3>
                <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahModal">Tambah
                    data</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <table class="datatable table table-striped table-sm text-center table-borderd">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n = 0;
                                foreach ($admins as $admin):
                                    $n++; ?>
                                    <tr>
                                        <td>
                                            <?= $n ?>
                                        </td>
                                        <td><?= $admin->username ?></td>
                                        <td><?= $admin->email ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button 
                                                    class="btn btn-sm btn-warning text-white" 
                                                    href="<?= site_url('admin/') ?>"
                                                    onclick="fill_edit('<?=$admin->uid?>', '<?=$admin->username?>','<?=$admin->email?>')"
                                                    data-toggle="modal"
                                                    data-target="#editModal"
                                                    >
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <a class="btn btn-sm btn-danger"
                                                    href="<?= site_url('admin/delete/' . $admin->uid) ?>"
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('admin/add_admin') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="username">Username <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
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
                    <label for="username">Username <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" name="username" id="edit-username" autocomplete="off" required>
                    <input type="hidden"  name="uid" id="edit-uid" >
                </div>
                <div class="form-group">
                    <label for="email">Email <sup class="text-danger">*</sup></label>
                    <input type="email" class="form-control" name="email" id="edit-email" autocomplete="off" required>
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