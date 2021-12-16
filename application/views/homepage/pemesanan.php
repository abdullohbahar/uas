<main id="main">
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 entries mt-5">
                    <article class="entry entry-single">
                        <div class="entry-content">
                            <table class="table table-borderless">
                                <tr>
                                    <td>#</td>
                                    <td>Nama Menu</td>
                                    <td>Harga Menu</td>
                                    <td>Jumlah Pemesanan</td>
                                    <td>Total harga</td>
                                    <td>Tanggal Acara</td>
                                    <td>Tanggal <br> Pemesanan</td>
                                    <td>Status</td>
                                    <td>Aksi</td>
                                </tr>
                                <?php
                                $no = 1;
                                ?>
                                <?php foreach ($pesanan as $p) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $p['nama_menu']; ?></td>
                                        <td><?= "Rp. " . number_format($p['harga'], 2, ',', '.') ?></td>
                                        <td><?= $p['jml_pesanan']; ?></td>
                                        <td><?= "Rp. " . number_format($p['total_harga'], 2, ',', '.') ?></td>
                                        <td><?= $p['tgl_acara']; ?></td>
                                        <td><?= $p['tgl_pemesanan']; ?></td>
                                        <td><?= $p['status']; ?></td>
                                        <td>
                                            <?php if ($p['status'] == 'BELUM DIBAYAR') : ?>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#bayarModal<?= $p['id_pesanan']; ?>">Bayar</button>
                                            <?php else : ?>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </article>
                    <!-- End blog entry -->
                </div>
                <!-- End blog entries list -->
            </div>
        </div>
    </section>
    <!-- End Blog Single Section -->
</main>
<!-- End #main -->

<!-- Modal -->
<?php foreach ($pesanan as $p) : ?>
    <div class="modal fade" id="bayarModal<?= $p['id_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('cart'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <center>
                                    <input type="hidden" value="<?= $p['total_harga']; ?>" name="total_harga">
                                    <h2><b>Harga Yang Harus Anda Bayarkan Sebanyak <?= "Rp. " . number_format($p['total_harga'], 2, ',', '.') ?></b></h2>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>