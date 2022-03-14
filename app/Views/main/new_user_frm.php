<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row my-5">
        <div class="col-lg-6 offset-lg-3 col-sm-8 offset-sm-2">

            <div class="new-user-wrapper">

                <p class="main-title"><?= $LNG->TXT('new_user_title') ?></p>

                <?= form_open('main/new_user_submit') ?>

                <div class="mb-3">
                    <label for="text_username" class="form-label"><?= $LNG->TXT('email') ?></label>
                    <input type="email" name="text_username" id="text_username" class="form-control" required minlength="10" maxlength="50" placeholder="<?= $LNG->TXT('new_user_valid_email') ?>" value="<?= old('text_username') ?>">
                </div>

                <div class="mb-3">
                    <label for="text_password" class="form-label"><?= $LNG->TXT('password') ?></label>
                    <input type="password" name="text_password" id="text_password" class="form-control" required minlength="6" maxlength="16" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)]">
                </div>

                <div class="mb-3">
                    <label for="text_repeat_password" class="form-label"><?= $LNG->TXT('new_user_repeat_password') ?></label>
                    <input type="password" name="text_repeat_password" id="text_repeat_password" class="form-control" required minlength="6" maxlength="16" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)]>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-12">
                        <a href="#" class="link-app"><?= $LNG->TXT('new_user_already_have_account') ?></a><br>
                        <a href="#" class="link-app"><?= $LNG->TXT('new_user_recover_passoword') ?></a>
                    </div>
                    <div class="col-sm-6 col-12 text-end">
                        <input type="submit" value="<?= $LNG->TXT('new_user_create_account') ?>" class="btn btn-primary">
                    </div>
                </div>

                <div class="mb-3 text-center">
                    <?= $LNG->TXT('new_user_disclaimer') ?>
                </div>

                <?= form_close() ?>

                <!-- validation errors -->
                <?php if (!empty($validation_errors)) : ?>
                    <div class="alert alert-danger p-2">
                        <small>

                            <?php foreach ($validation_errors as $error) : ?>

                                <i class="far fa-times-circle me-2"></i><?= $error ?><br>

                            <?php endforeach; ?>
                        </small>
                    </div>
                <?php endif; ?>

                 <!-- login errors -->
                <?php if(!empty($login_error)):?>                
                    <div class="alert alert-danger p-2">
                        <small>
                             <i class="far fa-times-circle me-2"></i><?= $login_error['error_message'] ?><br>
                        </small>
                    </div>

                    <!-- email is not confirmed -->
                    <?php if(!empty($login_error['error_number']) && $login_error['error_number'] == 'unconfirmed email'): ?>                        
                        <div class="text-center">
                            <a href="<?= site_url('main/send_email_confirmation/' . aes_encrypt($login_error['id_user'])) ?>" class="btn btn-primary"><?= $LNG->TXT('new_account_send_verification_email') ?></a>
                        </div>
                        <?php endif; ?>

                        <!-- not receiving newsletter -->
                    <?php if(!empty($login_error['error_number']) && $login_error['error_number'] == 'no newsletters'): ?>                        
                        <div class="text-center">
                                <p><?= $LNG->TXT('new_account_activate_newsletters') ?></p>
                                <a href="<?= site_url('main') ?>" class="btn btn-primary btn-150"><?= $LNG->TXT('no') ?></a>
                            <a href="<?= site_url('main/renew_newsletter_consent/' . aes_encrypt($login_error['id_user'])) ?>" class="btn btn-primary btn-150"><?= $LNG->TXT('yes') ?></a>
                        </div>
                        <?php endif; ?>

                <?php endif;?>

            </div>

            <div class="mt-5">
                <span class="link-app" onclick="preencher()">PREENCHER</span>
            </div>

        </div>
    </div>
</div>

<script>
    function preencher() {
        document.querySelector("#text_username").value = "joao@gmail.com";
        document.querySelector("#text_password").value = "Aa123456";
        document.querySelector("#text_repeat_password").value = "Aa123456";
    }
</script>

<?= $this->endSection() ?>