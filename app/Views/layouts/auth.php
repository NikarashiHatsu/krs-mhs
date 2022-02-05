<!DOCTYPE html>
<html lang="en" class="bg-slate-100" data-theme="<?= env("app.theme") ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? env('app.name') ?></title>
    <link rel="shortcut icon" href="<?= base_url('icon.svg') ?>">
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <script src="<?= base_url('js/app.js') ?>" defer></script>
    <script src="<?= base_url('js/app-non-defer.js') ?>"></script>
</head>
<body class="font-display antialiased text-base-content">
    <div class="max-w-md py-12 mx-auto">
        <?= $this->renderSection('content') ?>
    </div>

    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.6/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.6/firebase-analytics.js";

        const firebaseConfig = {
            apiKey: "AIzaSyADnNR4R3w3SJUr_FmnV01caif2fizhqxs",
            authDomain: "shiroyuki-dev.firebaseapp.com",
            projectId: "shiroyuki-dev",
            storageBucket: "shiroyuki-dev.appspot.com",
            messagingSenderId: "17647753783",
            appId: "1:17647753783:web:495b06d5daa5a58bbbbdb2",
            measurementId: "G-2EKN24QML2"
        };

        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
    </script>

    <script>
        console.log("Copyright 2022: Developer's note on behalf of Shiroyuki.dev and Aghits Nidallah");
    </script>
</body>
</html>