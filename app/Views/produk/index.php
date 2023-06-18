<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/create" class="btn btn-primary mt-5">Tambah Data Produk</a>
            <h1 class="my-3">List Produk</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>id_produk</th>
                            <th>nama_produk</th>
                            <th>harga</th>
                            <th>kategori</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($produk as $p) : ?>
                            <tr>
                                <th><?= $i++; ?></th>
                                <td><?= $p['id_produk']; ?></td>
                                <td><?= $p['nama_produk']; ?></td>
                                <td>Rp.<?= $p['harga']; ?></td>
                                <td><?= $p['kategori']; ?></td>
                                <td><?= $p['status']; ?></td>
                                <td class="d-flex gap-2 flex-column">
                                    <a class="btn btn-warning w-100" href="/edit/<?= $p['id_produk']; ?>">Ubah</a>
                                    <form action="/produk/<?= $p['id_produk']; ?>" method="post">
                                    <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

    <?= $this->endSection(); ?>