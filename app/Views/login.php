<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Jasa pembuatan karangan papan bunga untuk berbagai acara dan momen. Kami menyediakan papan bunga dengan desain elegan dan bahan berkualitas tinggi untuk pernikahan, ucapan selamat, ucapan duka cita, dan lainnya. Pesan sekarang untuk pengiriman cepat dan pelayanan terbaik.">
    <meta name="keywords" content="karangan papan bunga, jasa pembuatan bunga papan, desain papan bunga, papan bunga pernikahan, papan bunga ucapan selamat, papan bunga duka cita, bunga papan murah">
    <meta name="author" content="Karangan Bunga Manokwari">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Karangan Bunga Manokwari">
    <meta property="og:description" content="Jasa pembuatan karangan papan bunga untuk berbagai acara dan momen. Desain elegan dan bahan berkualitas tinggi untuk pernikahan, ucapan selamat, acara duka cita, dan lainnya. Pesan sekarang untuk pengiriman cepat dan pelayanan terbaik.">
    <meta property="og:image" content="<?= base_url(); ?>uploads/karanganbungamanokwari.jpg">
    <meta property="og:url" content="https://karanganbungamanokwari.com">
    <meta property="og:type" content="website">
    <title>Login | Karangan Bunga Manokwari</title>
    <!-- Favicons -->
    <link href="<?= base_url(); ?>frontend/assets/img/settings/favicon_io/favicon.ico" rel="icon">
    <link href="<?= base_url(); ?>frontend/assets/img/settings/favicon_io/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" />
</head>

<body>

    <section class="vh-100" style="background-image: url('<?= base_url(); ?>Login_v16/bg.jpg');">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5"><?= lang('Auth.loginTitle') ?></h3>
                            <?= view('Myth\Auth\Views\_message_block') ?>
                            <form action="<?= url_to('login') ?>" method="post">
                                <?= csrf_field() ?>
                                <?php if ($config->validFields === ['email']) : ?>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input name="login" type="email" id="typeEmailX-2" class="form-control form-control-lg <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.email') ?>" />
                                        <label class="form-label" for="login"><?= lang('Auth.email') ?></label>
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>

                                <?php else : ?>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input name="login" type="text" id="typeEmailX-2" class="form-control form-control-lg  <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.emailOrUsername') ?>" />
                                        <label class="form-label" for="login"><?= lang('Auth.emailOrUsername') ?></label>
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input name="password" type="password" id="typePasswordX-2" class="form-control form-control-lg  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" />
                                    <label class="form-label" for="password"><?= lang('Auth.password') ?></label>
                                    <div class="invalid-feedback">
                                        <?= session('errors.password') ?>
                                    </div>
                                </div>
                                <?php if ($config->allowRemembering) : ?>
                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-start mb-4">
                                        <input name="remember" class="form-check-input" type="checkbox" <?php if (old('remember')) : ?> checked <?php endif ?> />
                                        <label class="form-check-label" for="form1Example3"> <?= lang('Auth.rememberMe') ?>
                                        </label>
                                    </div>
                                <?php endif; ?>
                                <button class="btn btn-primary btn-lg btn-block" type="submit"><?= lang('Auth.loginAction') ?></button>

                            </form>
                            <a href="<?= base_url(); ?>">Kembali ke halaman depan Karangan Bunga Manokwari</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js">
    </script>
</body>

</html>