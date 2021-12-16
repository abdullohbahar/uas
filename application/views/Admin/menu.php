<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Menu</li>
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
                                <h5 class="col">Data Menu</h5>
                                <div class="col-0 mr-2">
                                    <button data-toggle="modal" data-target="#addModal" class="btn btn-success">Tambah Menu <i class="fas fa-plus"></i></button>
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
                                        <th>Nama Menu</th>
                                        <th>Harga Menu</th>
                                        <th>Deskripsi Menu</th>
                                        <th>Gambar Menu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    <?php foreach ($menu as $m) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $m['nama_menu']; ?></td>
                                            <td><?= $m['harga_menu']; ?></td>
                                            <td><?= $m['deskripsi_menu']; ?></td>
                                            <td><img class="w-100" src="<?= base_url('assets/img/upload/') . $m['gambar_menu']; ?>" alt=""></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" data-toggle="modal" data-target="#editModal<?= $m['id_menu']; ?>" title="Edit" class="btn btn-info"><i class="fas fa-edit"></i></button>
                                                    <a href="<?= base_url('menu/hapusMenu/') . $m['id_menu']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $m['nama_menu']; ?> ?');" title="Hapus" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-6 mt-2">
                            <label for="">Nama Menu</label>
                            <input type="text" name="nama" id="" class="form-control" required>
                        </div>
                        <div class="col-6 mt-2">
                            <label for="">Harga Menu</label>
                            <input type="number" name="harga" id="" class="form-control" required>
                        </div>
                        <div class="col-12 mt-2">
                            <label for="">Deskripsi Menu</label>
                            <textarea name="deskripsi_menu" id="" class="form-control"></textarea>
                        </div>
                        <div class="col-6 mt-2">
                            <label for="">Gambar Menu</label>
                            <input type="file" name="gambar" id="" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Menu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<?php
foreach ($menu as $m) :
?>
    <div class="modal fade" id="editModal<?= $m['id_menu']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/ubahMenu'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id_menu" value="<?= $m['id_menu']; ?>">
                        <div class="row">
                            <div class="col-6 mt-2">
                                <label for="">Nama Menu</label>
                                <input type="text" name="nama" value="<?= $m['nama_menu']; ?>" id="" class="form-control">
                            </div>
                            <div class="col-6 mt-2">
                                <label for="">Harga Menu</label>
                                <input type="number" name="harga" value="<?= $m['harga_menu']; ?>" id="" class="form-control">
                            </div>
                            <div class="col-12 mt-2">
                                <label for="">Deskripsi Menu</label>
                                <textarea name="deskripsi_menu" id="" class="form-control">
                                    <?= $m['deskripsi_menu']; ?>
                                </textarea>
                            </div>
                            <div class="col-6 mt-2">
                                <label for="">Gambar Menu</label>
                                <input type="file" name="gambar_menu" id="" class="form-control">
                                <span><i>Kosongkan Jika Tidak Ingin Diubah</i></span>
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