<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1 class="my-5">Form Ubah Produk</h1>

            <form action="/edit/<?= $produk['id_produk']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="id_produk" class="form-label fw-bold">id_produk</label>
                    <input type="text" class="form-control <?= (session('validation') ? "is-invalid" : ""); ?>" id="id_produk" aria-describedby="emailHelp" name="id_produk" value="<?= $produk['id_produk']; ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= session('validation')?->getError('id_produk'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="nama_produk" class="form-label fw-bold">nama_produk</label>
                    <input type="text" class="form-control <?= (session('validation') ? "is-invalid" : ""); ?>" id="nama_produk" name="nama_produk" value="<?= $produk['nama_produk']; ?>">
                    <div class="invalid-feedback">
                        <?= session('validation')?->getError('nama_produk'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label fw-bold">harga</label>
                    <input type="text" class="form-control <?= (session('validation') ? "is-invalid" : ""); ?>" id="harga" name="harga" value="<?= $produk['harga']; ?>">
                    <div class="invalid-feedback">
                        <?= session('validation')?->getError('harga'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label fw-bold">kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $produk['kategori']; ?>">
                </div>
                <div class="fw-bold mb-3">
                    <label class="" for="status">status</label>
                    <select class="form-select" id="status" name="status">
                        <option>...</option>
                        <option value="bisa dijual" <?= ($produk['status'] == 'bisa dijual') ? 'selected' : '' ?>>bisa dijual</option>
                        <option value="tidak bisa dijual" <?= ($produk['status'] == 'tidak bisa dijual') ? 'selected' : '' ?>>tidak bisa dijual</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Ubah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>