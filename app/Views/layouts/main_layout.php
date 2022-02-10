<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME . " " . APP_VERSION ?></title>
    <!-- css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
    <!-- favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo.png') ?>" type="image/png">
    <!-- fontawesome -->
    <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome/all.min.css') ?>">

</head>
<body>

<?= $this->include('layouts/main_bar') ?>

<?= $this->renderSection('content') ?>

<!-- scripts js -->
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    
</body>
</html>