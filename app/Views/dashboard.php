<?= $this->extend('components/app'); ?>
<?= $this->section('content'); ?>
<div>
    <h1 class="font-bold text-4xl mb-4">Dashboard</h1>
</div>
<section>
    <div class="stats shadow w-full mb-5">
        <div class="stat">
            <div class="stat-figure text-secondary">
            </div>
            <div class="stat-title">Total Pengguna</div>
            <div class="stat-value"><?= $user; ?></div>
            <div class="stat-desc">Pengguna BTS RENT</div>
        </div>

        <div class="stat">
            <div class="stat-figure text-secondary">

            </div>
            <div class="stat-title">New Users</div>
            <div class="stat-value">4,200</div>
            <div class="stat-desc">400 (22%)</div>
        </div>

        <div class="stat">
            <div class="stat-figure text-secondary">

            </div>
            <div class="stat-title">New Registers</div>
            <div class="stat-value">1,200</div>
            <div class="stat-desc">90 (14%)</div>
        </div>

        <div class="stat">
            <div class="stat-figure text-secondary">

            </div>
            <div class="stat-title">New Registers</div>
            <div class="stat-value">1,200</div>
            <div class="stat-desc">90 (14%)</div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>


<?= $this->section('script'); ?>
<script src="<?= base_url('assets/chart.js/dist/chart.umd.js'); ?>"></script>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
            datasets: [{
                label: 'Pesanan Berhasil',
                data: [0, 12, 19, 3, 5, 2, 3],
                borderWidth: 2,
                tension: 0.2
            }, {
                label: 'Pesanan Dibatalkan',
                data: [0, 9, 0, 10, 10, 2, 11],
                borderWidth: 2,
                tension: 0.2
            }, ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?= $this->endSection(); ?>