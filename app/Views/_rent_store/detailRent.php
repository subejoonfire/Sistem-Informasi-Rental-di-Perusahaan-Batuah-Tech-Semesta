<?= $this->extend('components/rents'); ?>
<?= $this->section('content'); ?>
<div class="mb-3">
    <h1 class="text-3xl font-bold">Detail Busana</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('user'); ?>" class="text-slate-400">Data Busana</a></li>
            <li>
                <p>Detail Rental</p>
            </li>
        </ul>
    </div>
</div>
<section>
    <div class="bg-white p-10 rounded-box flex gap-5 shadow-lg">
        <div>
            <div class="carousel carousel-vertical rounded-box shadow-lg border" style="height: 300px;">
                <div class="carousel-item h-[300px] w-80 overflow-hidden">
                    <img class="object-cover w-full h-full" src="/uploads/<?= $row->photo_busana ?>" />
                </div>
            </div>
        </div>
        <!-- Form Busana -->
        <div class="p-1 grow">
            <h1 class="font-bold text-lg">Informasi Busana</h1>
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="form-control mb-2">
                <h1 style="font-size:50px;font-weight:bold"><?= $row->nama_busana ?></h1>
            </div>
            <div class="form-control mb-2">
                <label class="label">Deskripsi</label>
                <textarea id="editor" name="deskripsi" class="deskripsi_busana" placeholder="Deskripsi" readonly><?= $row->deskripsi ?></textarea>
            </div>
            <div class="flex w-full gap-5">
                <div class="form-control mb-2 w-1/2">
                    <h1 style="font-size:20px;font-weight:bold" class="label">Harga Sewa</h1>
                    <h1 style="font-size:30px;font-weight:bold"><?= $row->harga_sewa ?></h1>
                </div>

                <div class="form-control w-1/2 mb-2">
                    <h1 style="font-size:20px;font-weight:bold" class="label">Jenis Busana</h1>
                    <h1 style="font-size:30px;font-weight:bold"><?= $row->nama_jenis ?></h1>
                </div>
            </div>
            <!-- Ukuran -->
            <form action="/rentAction/<?= $id_busana ?>" method="post">
                <div class="mt-2">
                    <h1 class="font-bold text-lg">Ukuran Busana</h1>
                    <div class="flex gap-3">
                        <?= csrf_field(); ?>
                        <div class="w-full flex gap-4">
                            <div class="form-control mb-2 w-1/2">
                                <label class="label">Jumlah</label>
                                <input name="jumlahsewa" type="number" placeholder="0" min="0" class="input input-bordered" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <h1 class="font-bold text-lg">Jaminan</h1>
                    <div class="flex gap-3">
                        <?= csrf_field(); ?>
                        <div class="w-full flex gap-4">
                            <div class="form-control mb-2 w-1/2">
                                <label class="label">Jaminan</label>
                                <input name="jaminan" type="text" placeholder="SIM/Rumah/Pesawat/Planet" class="input input-bordered" />
                            </div>
                            <div class="form-control mb-2 w-1/2">
                                <label class="label">Pesan</label>
                                <input name="pesan" type="text" placeholder="Pesan" min="0" class="input input-bordered" />
                            </div>
                            <div class="form-control mb-2 w-1/2">
                                <label class="label">Status Sewa</label>
                                <input name="status_sewa" type="text" placeholder="Status Sewa" min="0" class="input input-bordered" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-control mb-2 w-1/2">
                    <label class="label">Deskripsi Sewa</label>
                    <textarea id="editor" name="deskripsi_sewa" class="deskripsi_busana" placeholder="Deskripsi"></textarea>
                </div>

                <!-- Tanggal -->
                <div class="mt-2">
                    <h1 class="font-bold text-lg">Ukuran Busana</h1>
                    <div class="flex gap-3">
                        <?= csrf_field(); ?>
                        <div class="w-full flex gap-4">
                            <div class="form-control mb-2 w-1/2">
                                <label class="label">Tanggal Pinjam</label>
                                <input name="tanggalpinjam" type="date" placeholder="Ukuran M/S/XL/L" class="input input-bordered" />
                            </div>
                            <div class="form-control mb-2 w-1/2">
                                <label class="label">Tanggal Selesai</label>
                                <input name="tanggalselesai" type="date" placeholder="Ukuran M/S/XL/L" class="input input-bordered" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-control mb-2 w-1/2">
                    <label class="label">ID Voucher</label>
                    <select name="id_voucher" id="">
                        <?php $voucherModel = new \App\Models\VoucherModel();
                        $data = $voucherModel->get()->getResult();
                        foreach ($data as $row) :
                        ?>
                            <option value="<?= $row->id_voucher ?>"><?= $row->id_voucher ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-neutral">Sewa</button>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>