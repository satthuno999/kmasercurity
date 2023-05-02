<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: Hiếu <binh9aqktk@gmail.com>
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
          urls: ["{{ url_for('static', path='/css/fonts.min.css') }}"],
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
        <div class="logo-header" data-background-color="blue">
            <a href="index.html" class="logo">
                <!-- <img src="#" alt="navbar brand" class="navbar-brand" /> -->
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="icon-menu"></i>
                </span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="icon-menu"></i>
                </button>
            </div>
        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
            <div class="container-fluid">
                <div class="collapse" id="search-nav">
                    <form class="navbar-left navbar-form nav-search mr-md-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-search pr-1">
                                    <i class="fa fa-search search-icon"></i>
                                </button>
                            </div>
                            <input type="text" placeholder="Search ..." class="form-control" />
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item toggle-nav-search hidden-caret">
                        <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                            aria-expanded="false" aria-controls="search-nav">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown hidden-caret">
                        <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="notification">1</span>
                        </a>
                        <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                            <li>
                                <div class="dropdown-title">You have 1 new notification</div>
                            </li>
                            <li>
                                <div class="notif-scroll scrollbar-outer">
                                    <div class="notif-center">
                                        <a href="#">
                                            <div class="notif-icon notif-primary"><i class="fa fa-user-plus"></i></div>
                                            <div class="notif-content">
                                                <span class="block"> New user registered </span>
                                                <span class="time">5 minutes ago</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="see-all" href="javascript:void(0);">See all notifications<i
                                        class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="https://www.w3schools.com/howto/img_avatar.png" alt="..."
                                    class="avatar-img rounded-circle" />
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg">
                                            <img src="https://www.w3schools.com/howto/img_avatar.png"
                                                alt="image profile" class="avatar-img rounded" />
                                        </div>
                                        <div class="u-text">
                                            <h4>Admin</h4>
                                            <p class="text-muted">admin.kma@gmail.com</p>
                                            <a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View
                                                Profile</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">My Profile</a>
                                    <a class="dropdown-item" href="#">Inbox</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Account Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Logout</a>
                                </li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2">
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <div class="user">
                    <div class="avatar-sm float-left mr-2">
                        <img src='{{ profile["avatar_url"] }}' alt="..." class="avatar-img rounded-circle" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            <span>
                                {{ profile["name"] }}
                                <span class="user-level">{{ profile["role"] }}</span>
                                <span class="caret"></span>
                            </span>
                        </a>
                        <div class="clearfix"></div>

                        <div class="collapse in" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#profile">
                                        <span class="link-collapse">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#edit">
                                        <span class="link-collapse">Edit Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#settings">
                                        <span class="link-collapse">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-primary">
                    <li class="nav-item active">
                        <a data-toggle="collapse" href="/dashboard" class="collapsed" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Others</h4>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#">
                            <i class="fas fa-layer-group"></i>
                            <p>Models</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#sidebarLayouts">
                            <i class="fas fa-th-list"></i>
                            <p>Dataset</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                            <h5 class="text-white op-7 mb-2">Model's results given based on version {{ model["version"]
                                }}</h5>
                        </div>
                        <div class="ml-md-auto py-2 py-md-0">
                            <a href="/dashboard/analysis/" class="btn btn-white btn-border btn-round mr-2">Analyze</a>
                            <button id="btn-export" class="btn btn-secondary btn-round">Export</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-inner mt--5">
                <div class="row mt--2">
                    <div class="col-md-6">
                        <div class="card full-height">
                            <div class="card-body">
                                <div class="card-title">Overall Summary</div>
                                <div class="card-category">Overview information about accuracy prediction of model</div>
                                <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="circles-1"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Accuracy</h6>
                                    </div>
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="circles-2"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Precision</h6>
                                    </div>
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="circles-3"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Recall</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card full-height">
                            <div class="card-body">
                                <div class="card-title">Details Information</div>
                                <div class="row py-4">
                                    <div class="col-md-6 d-flex flex-column justify-content-around">
                                        <div>
                                            <h5 class="fw-bold op-8">Version</h5>
                                            <h3 class="fw-bold">{{ model["version"] }}</h3>
                                        </div>
                                        <div class="py-2"></div>
                                        <div>
                                            <h5 class="fw-bold op-8">File Size</h5>
                                            <h3 class="fw-bold">{{ model["size"] | filesizeformat }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex flex-column justify-content-around">
                                        <div>
                                            <h5 class="fw-bold op-8">Type</h5>
                                            <h3 class="fw-bold text-uppercase">{{ model["type"] }}</h3>
                                        </div>
                                        <div class="py-2"></div>
                                        <div>
                                            <h5 class="fw-bold op-8">Created Date</h5>
                                            <h3 class="fw-bold">{{ model["created_at"].strftime("%d-%m-%Y %H:%M:%S") }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-card-no-pd">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row card-tools-still-right">
                                    <h4 class="card-title">Training History</h4>
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-6 chart-container">
                                    <div id="accuracy-charts"></div>
                                </div>
                                <div class="col-md-6 chart-container">
                                    <div id="loss-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Help </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Licenses </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright ml-auto">
                    2023, made with <i class="fa fa-heart heart text-danger"></i> by <a href="#">K-Security</a>
                </div>
            </div>
        </footer>
    </div>
</div>

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

?>    

<script>
      const id = '{{ model["id"] }}'
      const accuracy = JSON.parse('{{ model["accuracy"] }}') * 100;
      const precision = JSON.parse('{{ model["precision"] }}') * 100;
      const recall = JSON.parse('{{ model["recall"] }}') * 100;

      $('#btn-export').click((event) => {
        swal({
          title: 'Export',
          buttons: {
            h5: {
              text: 'HDF5/H5',
              value: 'h5',
              visible: true,
            },
            tflite: {
              text: 'TFLite',
              value: 'tflite',
              visible: true,
            },
          },
        }).then((format) => {
          location.href = `/models/${id}/source?format=${format}`
        });
      });

      Circles.create({
        id: 'circles-1',
        radius: 45,
        value: accuracy,
        maxValue: 100,
        width: 8,
        text: `${Math.round(accuracy)}%`,
        colors: ['#f1f1f1', '#2BB930'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true,
      });

      Circles.create({
        id: 'circles-2',
        radius: 45,
        value: precision,
        maxValue: 100,
        width: 8,
        text: `${Math.round(precision)}%`,
        colors: ['#f1f1f1', '#2BB930'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true,
      });

      Circles.create({
        id: 'circles-3',
        radius: 45,
        value: recall,
        maxValue: 100,
        width: 8,
        text: `${Math.round(recall)}%`,
        colors: ['#f1f1f1', '#2BB930'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true,
      });

      const accuracyData = [
        {
          x: Array.from({ length: 101 }, (x, i) => i),
          y: JSON.parse('{{ model["history"]["accuracy"] | tojson }}'),
          mode: 'lines',
          name: 'train',
        },
        {
          x: Array.from({ length: 101 }, (x, i) => i),
          y: JSON.parse('{{ model["history"]["val_accuracy"] | tojson }}'),
          mode: 'lines',
          name: 'validation',
        },
      ];
      const lossData = [
        {
          x: Array.from({ length: 101 }, (x, i) => i),
          y: JSON.parse('{{ model["history"]["loss"] | tojson }}'),
          mode: 'lines',
          name: 'train',
        },
        {
          x: Array.from({ length: 101 }, (x, i) => i),
          y: JSON.parse('{{ model["history"]["val_loss"] | tojson }}'),
          mode: 'lines',
          name: 'validation',
        },
      ];

      Plotly.newPlot('accuracy-charts', accuracyData, {
        title: 'Model Accuracy',
        xaxis: {
          title: 'Epoch',
        },
        yaxis: {
          title: 'Accuracy',
        },
      });

      Plotly.newPlot('loss-charts', lossData, {
        title: 'Model Loss',
        xaxis: {
          title: 'Epoch',
        },
        yaxis: {
          title: 'Loss',
        },
      });
    </script>