<?= $this->extend('components/app'); ?>
<?= $this->section('content'); ?>
<div class="mb-3">
    <h1 class="text-3xl font-bold">Detail Jenis</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('user'); ?>" class="text-slate-400">Data Jenis</a></li>
            <li>
                <p>Detail Paket</p>
            </li>
        </ul>
    </div>
</div>

<?= $this->include('components/message'); ?>
<section>
    <!-- Form Busana -->
    <div class="p-1 grow">
        <h1 class="font-bold text-lg">Informasi Busana</h1>
        <form action="<?= base_url('/voucher/setVoucher/' . $row->id_voucher) ?> " method="POST" class="w-full" enctype="multipart/form-data">>
            <?= csrf_field(); ?>
            <div class="flex w-full gap-5">
                <div class="form-control mb-2 w-1/2">
                    <label class="label">Nama Voucher</label>
                    <input name="nama_voucher" value="<?= $row->nama_voucher ?>" type="text" placeholder="Nama Voucher" class="input input-bordered" />
                </div>
            </div>
            <div class="flex w-full gap-5">
                <div class="form-control mb-2 w-1/2">
                    <label class="label">Token Voucher</label>
                    <input name="token_voucher" value="<?= $row->token_voucher ?>" type="text" placeholder="Token Voucher" class="input input-bordered" />
                </div>
            </div>
            <div class="flex w-full gap-5">
                <div class="form-control mb-2 w-1/2">
                    <label class="label">Potongan</label>
                    <input name="potongan" value="<?= $row->potongan ?>" type="text" placeholder="Potongan" class="input input-bordered" />
                </div>
            </div>
            <div class="flex w-full gap-5">
                <div class="form-control mb-2 w-1/2">
                    <label class="label">Jumlah voucher</label>
                    <input name="jumlah_voucher" value="<?= $row->jumlah_voucher ?>" type="text" placeholder="Jumlah Voucher" class="input input-bordered" />
                </div>
            </div>
            <button type="submit" class="btn btn-neutral mt-2">SIMPAN INFORMASI</button>
            <button type="button" class="btn btn-accent" onclick="my_modal_1.showModal()">Hapus</button>
            <a type="submit" class="btn btn-error mt-2">BATAL</a>
        </form>
        <!-- Modal -->
        <dialog id="my_modal_1" class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Peringatan !</h3>
                <p class="py-4">Anda Akan Menghapus Busana ini Secara Permanen</p>
                <div class="modal-action">
                    <form action="<?= base_url('dapur/' . $row->id_voucher) ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-accent">Hapus</button>
                    </form>
                    <form method="dialog">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn">Close</button>
                    </form>
                </div>
            </div>
        </dialog>
    </div>
</section>
<?= $this->endSection(); ?>