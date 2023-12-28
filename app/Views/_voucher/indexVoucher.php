<?= $this->extend('components/app'); ?>
<?= $this->section('content'); ?>
<div class="mb-3">
    <h1 class="text-3xl font-bold">Voucher Busana</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('user'); ?>" class="text-slate-400"> Voucher Busana</a></li>
        </ul>
    </div>
</div>
<section>
    <div class="bg-white p-2 px-5 rounded-xl grow shadow-lg">
        <div class="flex w-full justify-between items-center mb-2">
            <h3 class="font-bold text-md mb-3 text-slate-400">Daftar Voucher</h3>
            <!-- Open the modal using ID.showModal() method -->
            <a href="<?= base_url('voucher/create'); ?>" class="py-1 px-5 bg-neutral rounded-lg text-white"><i class="fa-solid fa-plus"></i> Tambah Voucher</a>
        </div>
        <div class="overflow-x-auto capitalize">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Voucher</th>
                        <th>Token Voucher</th>
                        <th>Potongan</th>
                        <th>Jumlah Voucher</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($list_voucher as $item) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $item['nama_voucher']; ?></td>
                            <td><?= $item['token_voucher']; ?></td>
                            <td><?= $item['potongan']; ?></td>
                            <td><?= $item['jumlah_voucher']; ?></td>
                            <td>
                                <a href="<?= base_url('voucher/edit/') . $item['id_voucher']; ?>" class="text-2xl hover:text-slate-400"><i class="fa-solid fa-pen-to-square hover:scale-110"></i></a>
                            </td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>