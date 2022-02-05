<!DOCTYPE html>
<html data-theme="<?= env("app.theme") ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?? env('app.name') ?></title>
    <link rel="shortcut icon" href="<?= base_url('/icon.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <script src="<?= base_url('js/app.js') ?>" defer></script>
</head>

<body class="font-display antialiased text-base-content">
    <div class="drawer drawer-mobile min-h-screen">
        <input id="drawer" type="checkbox" class="drawer-toggle">
        <main class="drawer-content bg-base-200">
            <div class="flex lg:hidden items-center mb-4 h-16 bg-base-100/50 backdrop-blur-lg border-b border-base-300 px-6 sticky top-0 z-10">
                <label for="drawer" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </label>
            </div>
            <div class="p-6">
                <?= $this->renderSection('content') ?>
            </div>
        </main>
        <div class="drawer-side border-r border-r-base-300">
            <label for="drawer" class="drawer-overlay"></label>
            <aside class="overflow-y-auto w-80 bg-base-100 text-base-content">
                <div class="flex items-center p-4 border-b border-b-base-300 backdrop-blur-lg h-16 max-h-16 sticky top-0 z-50">
                    <img src="<?= base_url('/icon.png') ?>" class="w-6 h-6 object-contain" />
                    <h5 class="text-lg font-medium ml-2">
                        <?= env('app.name') ?>
                    </h5>
                </div>
                <div class="px-8 py-4 border-b border-b-base-200">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="flex flex-col ml-2">
                            <span class="text-xs mb-1 line-clamp-1 font-medium">
                                <?= session()->user->name ?>
                            </span>
                            <span class="text-xs">
                                <?= ucwords(str_replace('_', ' ', session()->user->role)) ?>
                            </span>
                        </div>
                    </div>
                </div>

                <ul class="menu p-4">
                    <li class="menu-title">
                        <span>
                            Dashboard
                        </span>
                    </li>
                    <li>
                        <a href="<?= base_url('/dashboard') ?>" class="<?= current_url(true)->getSegment(1) == 'dashboard' && current_url(true)->getSegment(2) == null ? 'active' : '' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="ml-2">
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <?php if(session()->user->role != 'mahasiswa'): ?>
                    <li class="menu-title mt-4">
                        <span>
                            Master Data
                        </span>
                    </li>
                    <li>
                        <a href="<?= base_url('/dashboard/matakuliah') ?>" class="<?= current_url(true)->getSegment(2) == 'matakuliah' ? 'active' : '' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="ml-2">
                                Mata Kuliah
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('/dashboard/krs') ?>" class="<?= current_url(true)->getSegment(2) == 'krs' ? 'active' : '' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                            </svg>
                            <span class="ml-2">
                                KRS
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('/dashboard/mahasiswa') ?>" class="<?= current_url(true)->getSegment(2) == 'mahasiswa' ? 'active' : '' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 256 256" stroke="currentColor">
                                <rect width="256" height="256" fill="none" stroke="none"></rect>
                                <line x1="32" y1="64" x2="32" y2="144" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
                                <path d="M54.2,216a88.1,88.1,0,0,1,147.6,0" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
                                <polygon points="224 64 128 96 32 64 128 32 224 64" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polygon>
                                <path d="M169.3,82.2a56,56,0,1,1-82.6,0" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
                            </svg>
                            <span class="ml-2">
                                Mahasiswa
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('/dashboard/dosen') ?>" class="<?= current_url(true)->getSegment(2) == 'dosen' ? 'active' : '' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 256 256" stroke="currentColor">
                                <rect width="256" height="256" fill="none" stroke="none"></rect>
                                <circle cx="104" cy="144" r="32" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle>
                                <path d="M53.4,208a56,56,0,0,1,101.2,0H216a8,8,0,0,0,8-8V56a8,8,0,0,0-8-8H40a8,8,0,0,0-8,8V200a8,8,0,0,0,8,8Z" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
                                <polyline points="176 176 192 176 192 80 64 80 64 96" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polyline>
                            </svg>
                            <span class="ml-2">
                                Dosen
                            </span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <li class="menu-title mt-4">
                        <span>
                            Mahasiswa
                        </span>
                    </li>
                    <li>
                        <a href="<?= base_url('/dashboard/krs_mahasiswa') ?>" class="<?= current_url(true)->getSegment(2) == 'krs_mahasiswa' ? 'active' : '' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 256 256" stroke="currentColor">
                                <rect width="256" height="256" fill="none" stroke="none"></rect>
                                <line x1="32" y1="64" x2="32" y2="144" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
                                <path d="M54.2,216a88.1,88.1,0,0,1,147.6,0" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
                                <polygon points="224 64 128 96 32 64 128 32 224 64" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polygon>
                                <path d="M169.3,82.2a56,56,0,1,1-82.6,0" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
                            </svg>
                            <span class="ml-2">
                                KRS Mahasiswa
                            </span>
                        </a>
                    </li>

                    <li class="menu-title mt-4">
                        <span>
                            User Control
                        </span>
                    </li>
                    <form action="<?= base_url('/logout') ?>" method="post" x-ref="form" x-data>
                        <li>
                            <a
                                href="javascript:void(0)"
                                type="submit"
                                class="hover:bg-red-500 hover:text-white"
                                x-on:click="$refs.form.submit()"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span class="ml-2">
                                    Log Out
                                </span>
                            </a>
                        </li>
                    </form>
                </ul>
            </aside>
        </div>
    </div>
</body>

</html>
