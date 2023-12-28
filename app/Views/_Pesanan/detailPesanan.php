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
        <form action="<?= base_url('/pesanan/setPesanan/' . $row->id_pesanan) ?> " method="POST" class="w-full" enctype="multipart/form-data">>
            <?= csrf_field(); ?>
            <div class="flex w-full gap-5">
                <div class="form-control mb-2 w-1/2">
                    <label class="label">Nama Pesanan</label>
                    <input name="nama_pesanan" value="<?= $row->nama_pesanan ?>" type="text" placeholder="Nama Pesanan" class="input input-bordered" />
                </div>
            </div>
            <div class="form-control mb-2">
                <label class="label">Deskripsi</label>
                <textarea id="editor" name="deskripsi_pesanan" class="deskripsi_busana" placeholder="Deskripsi"><?= $row->deskripsi_pesanan; ?></textarea>
            </div>
            <div class="flex w-full gap-5">
                <div class="form-control mb-2 w-1/2">
                    <label class="label">Harga</label>
                    <input name="harga" value="<?= $row->harga ?>" type="text" placeholder="Harga" class="input input-bordered" />
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
                    <form action="<?= base_url('pesanan/' . $row->id_pesanan) ?>" method="POST">
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