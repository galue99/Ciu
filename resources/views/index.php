<?php
/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 23/01/16
 * Time: 10:51 PM
 */
?>
<!DOCTYPE html>
<html lang="en-US" ng-app="ciuApp">
<head>
    <title>Ciu Inscripciones</title>
    <!-- Load Bootstrap CSS -->

    <link rel="stylesheet" href="<?= asset('css/tmm_form_wizard_style_demo.css')?>" />
    <link rel="stylesheet" href="<?= asset('css/grid.css')?>" />
    <link rel="stylesheet" href="<?= asset('css/tmm_form_wizard_layout.css') ?>" />
    <link rel="stylesheet" href="<?= asset('css/fontello.css') ?> "/>
    <link rel="stylesheet" href="<?= asset('css/estilo.css') ?> "/>
    <link rel="stylesheet" href="<?= asset('css/SpryAccordion.css') ?>">
    <link rel="stylesheet" href="<?= asset('app/lib/angular-toastr/dist/angular-toastr.min.css') ?>">

</head>
<body>
<div id="content">

    <div class="form-container">

        <div id="tmm-form-wizard" class="container substrate">

            <div class="row">
                <div class="col-xs-12">
                    <h2 class="form-login-heading"><span></span></h2>
                </div>

            </div><!--/ .row-->

    <ui-view></ui-view>


        </div><!--/ #content-->

<!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
<script src="<?= asset('js/jquery.js') ?>"></script>
<script src="<?= asset('app/lib/angular/angular.js') ?>"></script>
<script src="<?= asset('app/lib/angular-ui-router/release/angular-ui-router.min.js') ?>"></script>
<script src="<?= asset('app/lib/angular-resource/angular-resource.min.js') ?>"></script>
<script src="<?= asset('app/lib/satellizer/satellizer.min.js') ?>"></script>
<script src="<?= asset('app/lib/angular-toastr/dist/angular-toastr.tpls.js') ?>"></script>
<script src="<?= asset('js/bootstrap.js') ?>"></script>
<!-- Finish Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->

<!-- AngularJS Application Scripts -->
<script src="<?= asset('app/module.js') ?>"></script>
<script src="<?= asset('app/route.js') ?>"></script>
<script src="<?= asset('app/constant.js') ?>"></script>
<script src="<?= asset('app/services.js') ?>"></script>
<script src="<?= asset('app/controllers/login.controller.js') ?>"></script>
<script src="<?= asset('app/controllers/logout.controller.js') ?>"></script>
<script src="<?= asset('app/controllers/signup.controller.js') ?>"></script>
<!-- Finish AngularJS Application Scripts -->
</body>
</html>