<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?= $this->include('components/alerts') ?>
<h6 class="text-lg font-medium mb-6">
    Welcome, <?= session()->user->name ?>
</h6>

<div class="w-full stats border">
    <div class="stat">
        <div class="stat-figure text-primary ml-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>
        <div class="stat-title">Total Mata Kuliah</div>
        <div class="stat-value text-primary">
            <?= $jumlah_matakuliah ?>
        </div>
    </div>

    <div class="stat">
        <div class="stat-figure text-secondary ml-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>
        </div>
        <div class="stat-title">Total KRS</div>
        <div class="stat-value text-secondary">
            <?= $jumlah_krs ?>
        </div>
    </div>

    <div class="stat">
        <div class="stat-figure text-accent ml-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current text-accent" viewBox="0 0 256 256" stroke="currentColor">
                <rect width="256" height="256" fill="none" stroke="none"></rect>
                <line x1="32" y1="64" x2="32" y2="144" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
                <path d="M54.2,216a88.1,88.1,0,0,1,147.6,0" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
                <polygon points="224 64 128 96 32 64 128 32 224 64" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polygon>
                <path d="M169.3,82.2a56,56,0,1,1-82.6,0" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
            </svg>
        </div>
        <div class="stat-title">Total Mahasiswa</div>
        <div class="stat-value text-accent">
            <?= $jumlah_mahasiswa ?>
        </div>
    </div>

    <div class="stat">
        <div class="stat-figure text-neutral ml-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-current text-neutral" viewBox="0 0 256 256" stroke="currentColor">
                <rect width="256" height="256" fill="none" stroke="none"></rect>
                <circle cx="104" cy="144" r="32" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle>
                <path d="M53.4,208a56,56,0,0,1,101.2,0H216a8,8,0,0,0,8-8V56a8,8,0,0,0-8-8H40a8,8,0,0,0-8,8V200a8,8,0,0,0,8,8Z" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
                <polyline points="176 176 192 176 192 80 64 80 64 96" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polyline>
            </svg>
        </div>
        <div class="stat-title">Total Dosen</div>
        <div class="stat-value text-neutral">
            <?= $jumlah_dosen ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>