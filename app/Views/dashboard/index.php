<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<h6 class="text-lg font-medium mb-6">
    Welcome, <?= session()->user->name ?>
</h6>

<div class="grid grid-cols-3 gap-4">
    <div class=" card shadow-2xl lg:card-side bg-slate-600">
        <div class="card-body">
            <p class="text-gray-50 text-lg mb-2">Jumlah Mahasiswa</p>
            <p class="text-gray-50 text-5xl"><?= $jumlah_mahasiswa ?></p>
            <div class="justify-end card-actions">
                <a href="<?= base_url('dashboard/mahasiswa') ?>" class="btn btn-primary">
                    More info

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-6 h-6 ml-2 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class=" card shadow-2xl lg:card-side bg-red-600">
        <div class="card-body">
            <p class="text-gray-50 text-lg mb-2">Jumlah Dosen</p>
            <p class="text-gray-50 text-5xl"><?= $jumlah_dosen ?></p>
            <div class="justify-end card-actions">
                <a href="<?= base_url('dashboard/dosen') ?>" class="btn btn-primary">
                    More info

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-6 h-6 ml-2 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class=" card shadow-2xl lg:card-side bg-emerald-600">
        <div class="card-body">
            <p class="text-gray-50 text-lg mb-2">Jumlah Matakuliah</p>
            <p class="text-gray-50 text-5xl"><?= $jumlah_matakuliah ?></p>
            <div class="justify-end card-actions">
                <a href="<?= base_url('dashboard/matakuliah') ?>" class="btn btn-primary">
                    More info

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-6 h-6 ml-2 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class=" card shadow-2xl lg:card-side bg-teal-600">
        <div class="card-body">
            <p class="text-gray-50 text-lg mb-2">Jumlah KRS</p>
            <p class="text-gray-50 text-5xl"><?= $jumlah_krs ?></p>
            <div class="justify-end card-actions">
                <a href="<?= base_url('dashboard/krs') ?>" class="btn btn-primary">
                    More info

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-6 h-6 ml-2 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>