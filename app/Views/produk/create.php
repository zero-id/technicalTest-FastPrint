<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1 class="my-5">Form Tambah Data Produk</h1>

            <form action="/create" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="id_produk" class="form-label fw-bold">id_produk</label>
                    <input type="text" class="form-control <?= (session('validation') ? "is-invalid" : ""); ?>" id="id_produk" aria-describedby="emailHelp" name="id_produk" value="<?= old('id_produk'); ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= session('validation')?->getError('id_produk'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="nama_produk" class="form-label fw-bold">nama_produk</label>
                    <input type="text" class="form-control <?= (session('validation') ? "is-invalid" : ""); ?>" id="nama_produk" name="nama_produk" value="<?= old('nama_produk'); ?>">
                    <div class="invalid-feedback">
                        <?= session('validation')?->getError('nama_produk'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label fw-bold">harga</label>
                    <input type="text" class="form-control <?= (session('validation') ? "is-invalid" : ""); ?>" id="harga" name="harga" value="<?= old('harga'); ?>">
                    <div class="invalid-feedback">
                        <?= session('validation')?->getError('harga'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label fw-bold">kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" value="<?= old('kategori'); ?>">
                </div>
                <div class="fw-bold mb-3">
                    <label class="" for="status">status</label>
                    <select class="form-select" id="status" name="status">
                        <option>...</option>
                        <option value="bisa dijual">bisa dijual</option>
                        <option value="tidak bisa dijual">tidak bisa dijual</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Tambah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>