<?= $this->extend('components/app'); ?>
<?= $this->section('content'); ?>
<div class="mb-3">
    <h1 class="text-3xl font-bold">Form Tambah Dapur Busana</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('dapur'); ?>" class="text-slate-400">Data Dapur Busana</a></li>
            <li>
                <p>Tambah Dapur Busana</p>
            </li>
        </ul>
    </div>
</div>
<div class="p-5 flex gap-2">
    <section class="w-1/2 bg-white rounded-box shadow-lg p-5">
        <form action="<?= base_url('dapur/store'); ?>" method="POST" class="w-full">
            <?= csrf_field(); ?>
            <div class="form-control mb-2">
                <label class="label">Nama Dapur Busana</label>
                <input name="nama_dapur" value="<?= old('nama_dapur'); ?>" type="text" placeholder="Nama Dapur Busana" class="input input-bordered" />
            </div>
            <div class="form-control mb-2">
                <label class="label">Deskripsi</label>
                <textarea id="editor" name="deskripsi_dapur" class="textarea textarea-bordered" placeholder="Deskripsi"><?= old('deskripsi_dapur'); ?></textarea>
            </div>
            <div class="form-control mb-2">
                <label class="label">Harga Dapur Busana</label>
                <input name="harga_dapur" value="<?= old('harga_dapur'); ?>" type="text" placeholder="Harga Sewa" class="input input-bordered" />
            </div>
            <button type="submit" class="btn btn-neutral mt-2">SIMPAN</button>
            <a href="<?= base_url('dapur'); ?>" class="btn btn-error mt-2">BATAL</a>
        </form>
    </section>
    <section class="w-1/2">
        <?= $this->include('components/message'); ?>
    </section>
</div>
<?= $this->endSection(); ?>