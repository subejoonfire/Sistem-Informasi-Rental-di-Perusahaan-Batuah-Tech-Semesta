<?= $this->extend('components/app'); ?>
<?= $this->section('content'); ?>
<div class="mb-3">
    <h1 class="text-3xl font-bold">Form Tambah Pesanan Busana</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('pesanan'); ?>" class="text-slate-400">Data Pesanan Busana</a></li>
            <li>
                <p>Tambah Pesanan Busana</p>
            </li>
        </ul>
    </div>
</div>
<div class="p-5 flex gap-2">
    <section class="w-1/2 bg-white rounded-box shadow-lg p-5">
        <form action="<?= base_url('pesanan/store'); ?>" method="POST" class="w-full">
            <?= csrf_field(); ?>
            <div class="form-control mb-2">
                <label class="label">Nama Pesanan</label>
                <input name="nama_pesanan" value="<?= old('nama_pesanan'); ?>" type="text" placeholder="Nama Pesanan" class="input input-bordered" />
            </div>
            <div class="form-control mb-2">
                <label class="label">Deskripsi Pesanan</label>
                <input name="deskripsi_pesanan" type="text" placeholder="Deskripsi Pesanan" class="input input-bordered" />
            </div>
            <div class="form-control mb-2">
                <label class="label">Harga</label>
                <input name="harga" type="text" placeholder="Harga" class="input input-bordered" />
            </div>
            <button type="submit" class="btn btn-neutral mt-2">SIMPAN</button>
            <a href="<?= base_url('voucher'); ?>" class="btn btn-error mt-2">BATAL</a>
        </form>
    </section>
    <section class="w-1/2">
        <?= $this->include('components/message'); ?>
    </section>
</div>
<?= $this->endSection(); ?>