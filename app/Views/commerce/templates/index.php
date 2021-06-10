<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Wowy - HTML eCommerce + Admin Template</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url()  ?>/frontend/imgs/theme/favico.svg">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url()  ?>/frontend/css/main.css">
</head>
<body>
        <main class="main">
                <?= $this->include('commerce/templates/header') ?>

    
                <?php $this->renderSection('content') ?>
                <?= $this->include('commerce/templates/footer') ?>

    </main>

    <script src="<?= base_url()  ?>/frontend/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/plugins/slick.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/plugins/jquery.syotimer.min.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/plugins/wow.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/plugins/jquery-ui.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/plugins/perfect-scrollbar.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/plugins/magnific-popup.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/plugins/select2.min.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/plugins/waypoints.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/plugins/counterup.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/plugins/jquery.countdown.min.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/plugins/images-loaded.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/plugins/isotope.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/plugins/scrollup.js"></script>
    <script src="<?= base_url()  ?>/frontend/js/plugins/jquery.vticker-min.js"></script>
    <!-- Template  JS -->
    <script src="<?= base_url()  ?>/./frontend/js/main.js"></script>
    <script src="<?= base_url()  ?>/./frontend/js/shop.js"></script>
</body>

</html>