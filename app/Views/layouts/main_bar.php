<div class="container-fluid main-bar">
    <div class="row">

        <div class="col-6 p-2">
            <div class="d-flex">
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="STAVORA logo" width="75">
                <h3 class="align-self-center">SYSTEM</h3>
            </div>
        </div>

        <div class="col-6 p-2 text-end align-self-center">

            <?php if(session()->has('user')): ?>

                <i class="far fa-user me-2"></i>
                <a href="#" class="link-app"><?= session('user')['username'] ?></a>
                <span class="mx-2 opacity-50">|</span>
                <a href="<?= site_url('main/logout_teste') ?>" class="link-app"><?= $LNG->TXT('logout') ?></a>
            <?php else: ?>

                <a href="<?= site_url('main/login_teste') ?>" class="link-app"><?= $LNG->TXT('login') ?></a>
                <span class="mx-2 opacity-50">|</span>
                <a href="<?= site_url('main/new_user') ?>" class="link-app"><?= $LNG->TXT('sign in') ?></a>
            <?php endif; ?>

            <a href="<?= site_url('main/change_language/pt') ?>"><img src="<?= base_url('assets/images/icons/pt-br.png') ?>" alt="Brasil" class="m-1" ></a>

            <a href="<?= site_url('main/change_language/en') ?>"><img src="<?= base_url('assets/images/icons/en.png') ?>" alt="English" class="m-1" ></a>

        </div>
    </div>
</div>