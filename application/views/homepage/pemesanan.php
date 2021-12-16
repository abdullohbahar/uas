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