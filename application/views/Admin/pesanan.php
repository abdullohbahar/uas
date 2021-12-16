<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Pesanan</li>
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
                                <h5 class="col">Data Pesanan</h5>
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
                                        <th>Nama Pelanggan</th>
                                        <th>Nama Menu</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                        <th>Tanggal Pengiriman</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    <?php foreach ($pesanan as $p) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p['nama_pelanggan']; ?></td>
                                            <td><?= $p['nama_menu']; ?></td>
                                            <td><?= $p['jml_pesanan']; ?></td>
                                            <td><?= $p['harga'] * $p['jml_pesanan'] ?></td>
                                            <td><?= $p['tgl_acara']; ?></td>
                                            <td><?= $p['status']; ?></td>
                                            <td>
                                                <button class="btn btn-warning" data-toggle="modal" data-target="#detailModal<?= $p['id_pesanan']; ?>" title="detail"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-info" data-toggle="modal" data-target="#updateStatus<?= $p['id_pesanan']; ?>">Update Status</button>
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
<?php foreach ($pesanan as $p) : ?>
    <div class="modal fade" id="detailModal<?= $p['id_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-6 mt-4">
                            <label for="">Nama Pelanggan</label><br>
                            <?= $p['nama_pelanggan'] ?>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="">Nama Menu</label><br>
                            <?= $p['nama_menu'] ?>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="">Kategori Menu</label><br>
                            <?= $p['kategori_menu'] ?>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="">Harga Menu</label><br>
                            <?= "Rp. " . number_format($p['harga'], 2, ',', '.') ?>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="">Jumlah Pemesanan</label><br>
                            <?= $p['jml_pesanan'] ?>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="">Total Harga</label><br>
                            <?= "Rp. " . number_format($p['harga'] * $p['jml_pesanan'], 2, ',', '.') ?>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="">Tanggal Pengiriman</label><br>
                            <?= $p['tgl_acara'] ?>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="">Tanggal Pemesanan</label><br>
                            <?= $p['tgl_pemesanan'] ?>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="">Nomor HP</label><br>
                            <?= $p['nohp'] ?>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="">Alamat</label><br>
                            <?= $p['alamat'] ?>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="">Status</label><br>
                            <?= $p['status'] ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?php foreach ($pesanan as $p) : ?>
    <div class="modal fade" id="updateStatus<?= $p['id_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('pesanan/updatestatus'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mt-2">
                                <label for="">Status</label>
                                <input type="hidden" name="id_pesanan" value="<?= $p['id_pesanan']; ?>">
                                <select name="status" class="form-control" id="">
                                    <option value="DIBAYAR">DIBAYAR</option>
                                    <option value="PROSES">PROSES</option>
                                    <option value="DIKIRIM">DIKIRIM</option>
                                    <option value="SELESAI">SELESAI</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>