<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: S P A R K <binh9aqktk@gmail.com>
// SPDX-License-Identifier: AGPL-3.0-or-later

use OCP\Util;

Util::addScript('kmasercurity', 'plugin/webfont/webfont.min');
Util::addStyle('kmasercurity', 'fonts.min');
?>
<script>
    WebFont.load({
        google: { families: ['Lato:300,400,700,900'] },
        custom: {
            families: ['Flaticon', 'Font Awesome 5 Solid', 'Font Awesome 5 Regular', 'Font Awesome 5 Brands', 'simple-line-icons'],
            urls: ["<?php OC.generateUrl('apps/kmasercurity/css/fonts.min.css'); ?>"],
        },
        active: function () {
            sessionStorage.fonts = true;
        },
    });
</script>
<?php
Util::addStyle('kmasercurity', 'bootstrap.min');
Util::addStyle('kmasercurity', 'atlantis');
?>
<div class="wrapper">
    <div class="main-header">
        <!-- Logo Header -->
        <?php print_unescaped($this->inc('partials/logoheader')); ?>

        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <?php print_unescaped($this->inc('partials/navbar')); ?>
        
        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <?php print_unescaped($this->inc('partials/slidebar')); ?>
    <!-- End Sidebar -->

    <div class="main-panel">
        <?php print_unescaped($this->inc('views/dashboard')); ?>
        
        <?php print_unescaped($this->inc('partials/footer')); ?>
    </div>
</div>
<?php
Util::addStyle('kmasercurity', 'bootstrap.min');
Util::addStyle('kmasercurity', 'atlantis');
?>
<?php
Util::addScript('kmasercurity', 'core/jquery.3.2.1.min');
Util::addScript('kmasercurity', 'core/popper.min');
Util::addScript('kmasercurity', 'core/bootstrap.min');

Util::addScript('kmasercurity', 'plugin/jquery-ui-1.12.1.custom/jquery-ui.min');
Util::addScript('kmasercurity', 'plugin/query-ui-touch-punch/jquery.ui.touch-punch');

Util::addScript('kmasercurity', 'plugin/jquery-scrollbar/jquery.scrollbar.min');

Util::addScript('kmasercurity', 'plugin/chart-circle/circles.min');

Util::addScript('kmasercurity', 'plugin/bootstrap-notify/bootstrap-notify.min');

Util::addScript('kmasercurity', 'plugin/sweetalert/sweetalert.min');

Util::addScript('kmasercurity', 'plugin/plotly/plotly.min');

Util::addScript('kmasercurity', 'atlantis.min');


// Util::addScript('kmasercurity', 'dashboard');

Util::addScript('kmasercurity', 'app');
?>    

