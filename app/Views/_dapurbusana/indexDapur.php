<?= $this->extend('components/app'); ?>
<?= $this->section('content'); ?>
<div class="mb-3">
    <h1 class="text-3xl font-bold">Dapur Busana</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('user'); ?>" class="text-slate-400"> Dapur Busana</a></li>
        </ul>
    </div>
</div>
<section>
    <div class="bg-white p-2 px-5 rounded-xl grow shadow-lg">
        <div class="flex w-full justify-between items-center mb-2">
            <h3 class="font-bold text-md mb-3 text-slate-400">Daftar Dapur</h3>
            <!-- Open the modal using ID.showModal() method -->
            <a href="<?= base_url('dapur/create'); ?>" class="py-1 px-5 bg-neutral rounded-lg text-white"><i class="fa-solid fa-plus"></i> Tambah Dapur</a>
        </div>
        <div class="overflow-x-auto capitalize">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dapur</th>
                        <th>Deskripsi Dapur</th>
                        <th>Harga Dapur</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($list_dapur as $item) : ?>
                        <tr>
                            <td><?= $i; ?></td>

                            <td><?= $item['nama_dapur']; ?></td>
                            <td><?= substr($item['deskripsi_dapur'], 0, 40) . "..." ?></td>
                            <td><?= $item['harga_dapur']; ?></td>
                            <td>
                                <a href="<?= base_url('dapur/edit/') . $item['id_dapur']; ?>" class="text-2xl hover:text-slate-400"><i class="fa-solid fa-pen-to-square hover:scale-110"></i></a>
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