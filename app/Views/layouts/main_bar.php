<div class="container-fluid">
    <div class="row">

        <div class="col-6 p-2">
            <div class="d-flex">
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="STAVORA logo" width="75">
                <h3 class="align-self-center">SYSTEM</h3>
            </div>
        </div>

        <div class="col-6 p-2 text-end align-self-center">

            <?php if(session()->has('user')): ?>
                <span class="mr-3"><?= session('user')['username'] ?></span>
                <a href="<?= site_url('main/logout_teste') ?>">LOGOUT</a>
            <?php else: ?>
                <a href="<?= site_url('main/login_teste') ?>">LOGIN</a>
            <?php endif; ?>

            <a href="<?= site_url('main/change_language/pt') ?>"><img src="<?= base_url('assets/images/icons/pt-br.png') ?>" alt="Brasil" class="m-1" ></a>

            <a href="<?= site_url('main/change_language/en') ?>"><img src="<?= base_url('assets/images/icons/en.png') ?>" alt="English" class="m-1" ></a>

        </div>
    </div>
</div>