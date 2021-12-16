<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Admin</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-end">
                                <h5 class="col">Data Admin</h5>
                                <div class="col-0 mr-2">
                                    <button data-toggle="modal" data-target="#addModal" class="btn btn-success">Tambah Admin <i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if (validation_errors()) { ?>
                                <div class="alert alert-danger" role="alert"> <?= validation_errors(); ?> </div>
                            <?php } ?>
                            <?= $this->session->flashdata('pesan'); ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Nama Admin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    <?php foreach ($admin as $p) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p['username']; ?></td>
                                            <td><?= $p['nama_lengkap']; ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" data-toggle="modal" data-target="#editModal<?= $p['id_admin']; ?>" title="Edit" class="btn btn-info"><i class="fas fa-edit"></i></button>
                                                    <a href="<?= base_url('admin/hapusAdmin/') . $p['id_admin']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $p['nama_lengkap']; ?> ?');" title="Hapus" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/dataAdmin'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-6 mt-2">
                            <label for="">Username</label>
                            <input type="text" name="username" id="" class="form-control" required>
                        </div>
                        <div class="col-6 mt-2">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="" class="form-control" required>
                        </div>
                        <div class="col-6 mt-2">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Admin</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<?php
foreach ($admin as $m) :
?>
    <div class="modal fade" id="editModal<?= $m['id_admin']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/ubahAdmin'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id_admin" value="<?= $m['id_admin']; ?>">
                        <div class="row">
                            <div class="col-6 mt-2">
                                <label for="">Username</label>
                                <input type="text" name="username" value="<?= $m['username']; ?>" id="" class="form-control">
                            </div>
                            <div class="col-6 mt-2">
                                <label for="">Nama Lengkap</label>
                                <input type="namna_lengkap" name="nama_lengkap" value="<?= $m['nama_lengkap']; ?>" id="" class="form-control">
                            </div>
                            <div class="col-6 mt-2">
                                <label for="">Password</label>
                                <input type="password" name="password" id="" class="form-control">
                                <span>Kosongkan Jika Tidak Ingin Diubah</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ubah Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>