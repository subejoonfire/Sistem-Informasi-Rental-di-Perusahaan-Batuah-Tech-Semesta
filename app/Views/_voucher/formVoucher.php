<?= $this->extend('components/app'); ?>
<?= $this->section('content'); ?>
<div class="mb-3">
    <h1 class="text-3xl font-bold">Form Tambah Voucher Busana</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('voucher'); ?>" class="text-slate-400">Data Voucher Busana</a></li>
            <li>
                <p>Tambah Voucher Busana</p>
            </li>
        </ul>
    </div>
</div>
<div class="p-5 flex gap-2">
    <section class="w-1/2 bg-white rounded-box shadow-lg p-5">
        <form action="<?= base_url('voucher/store'); ?>" method="POST" class="w-full">
            <?= csrf_field(); ?>
            <div class="form-control mb-2">
                <label class="label">Nama Voucher Busana</label>
                <input name="nama_voucher" value="<?= old('nama_voucher'); ?>" type="text" placeholder="Nama Voucher Busana" class="input input-bordered" />
            </div>
            <div class="form-control mb-2">
                <label class="label">Token Voucher Busana</label>
                <input name="token_voucher" type="text" placeholder="Token Voucher Busana" class="input input-bordered" />
            </div>
            <div class="form-control mb-2">
                <label class="label">Potongan</label>
                <input name="potongan" type="text" placeholder="Potongan" class="input input-bordered" />
            </div>
            <div class="form-control mb-2">
                <label class="label">Jumlah Voucher</label>
                <input name="jumlah_voucher" type="text" placeholder="Jumlah Voucher" class="input input-bordered" />
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