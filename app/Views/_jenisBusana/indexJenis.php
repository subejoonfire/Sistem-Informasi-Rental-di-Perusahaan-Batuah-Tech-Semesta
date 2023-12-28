<?= $this->extend('components/app'); ?>
<?= $this->section('content'); ?>
<div class="mb-3">
    <h1 class="text-3xl font-bold">Jenis Busana</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('jenis'); ?>" class="text-slate-400">Jenis Busana</a></li>
        </ul>
    </div>
</div>
<section class="flex gap-4">
    <!-- Daftar User -->
    <div class="bg-white p-2 px-5 rounded-xl grow shadow-lg">
        <div class="flex w-full justify-between items-center mb-2">
            <h3 class="font-bold text-md mb-3 text-slate-400">Daftar Jenis Busana</h3>
            <!-- Open the modal using ID.showModal() method -->
            <!-- <a href="<?= base_url('jenis/create'); ?>" class="py-1 px-5 bg-neutral rounded-lg text-white"><i class="fa-solid fa-plus"></i> Tambah User</a> -->
        </div>
        <div class="overflow-x-auto capitalize">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Busana</th>
                        <th>Jumlah Busana</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($list_jenis as $item) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $item->nama_jenis; ?></td>
                            <td><?= $item->jumlah_busana; ?></td>
                            <td>
                                <a href="<?= base_url('jenis/') . $item->id_jenis; ?>" class="text-2xl hover:text-slate-400"><i class="fa-solid fa-pen-to-square hover:scale-110"></i></a>
                                <form action="<?= base_url('jenis/' . $item->id_jenis); ?>" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="text-2xl hover:text-slate-400"><i class="fa-solid fa-trash hover:scale-110"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white rounded-xl w-1/4 p-5 shadow-lg">
        <?= $this->include('components/message'); ?>
        <form action="<?= base_url('/jenis/store'); ?>" class="w-full" method="POST">
            <?= csrf_field(); ?>
            <?php if ($form == 'update') : ?>
                <input type="hidden" name="_method" value="PUT">
            <?php endif; ?>
            <div class="form-control mb-2">
                <label class="label">Nama Jenis Busana</label>
                <input name="nama_jenis" type="text" placeholder="Nama Jenis Busana" class="input input-bordered" />
            </div>
            <div class="flex justify-end gap-5 mt-3">
                <button class="btn btn-neutral shadow-md"><?= $form; ?></button>
            </div>
        </form>
    </div>
</section>
<?= $this->endSection(); ?>