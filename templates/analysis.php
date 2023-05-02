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
        <div class="container">
            <?php
            $uri = $_SERVER['REQUEST_URI'];
            ?>
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Analysis</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="/">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/">Dashboard</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a>Analysis</a>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Dropzone</div>
                    </div>
                    <div class="card-body">
                        <form id="apk-files" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);"
                            method="post" enctype="multipart/form-data" class="dropzone dz-clickable">
                            <div class="dz-message" data-dz-message="">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="80" fill="currentColor"
                                        viewBox="0 0 256 170">
                                        <g>
                                            <path style="fill: #20242c"
                                                d="M71 8h80.9v29.1c0 2.2 1.8 4 4 4h30V47h8v-9.1c0-1.6-.6-3.1-1.7-4.2L161.1 1.8C160 .6 158.4 0 156.8 0H68c-2.8 0-5 2.2-5 5v42h8V8Zm88.9 4 20.5 21h-20.5V12Z">
                                            </path>
                                            <path style="fill: #626c84" fill-rule="evenodd"
                                                d="M185.9 161.9H71V59h-8v105.9c0 2.8 2.2 5 5 5h120.9c2.8 0 5-2.2 5-5V59h-8v102.9ZM103 63.3c.7.8 2 .9 2.8.2 1.8-1.6 4.6-3.2 8-4.5h-8.7c-.7.5-1.3 1-1.9 1.5-.9.7-.9 2-.2 2.8Zm49.5.1c.8-.8.7-2.1-.1-2.8l-1.8-1.5h-7.7c2.4 1.1 4.7 2.6 6.8 4.5.7.6 2 .6 2.8-.2Zm-41.1 51.7c-2.6-6.1-3.7-12.8-1.1-18.8 2.9-6.7 8.6-9.6 14.3-10.4 2.9-.4 5.7-.3 8.1.1 2.4.4 4.3 1.1 5.2 1.7 4.7 3.1 9.5 7.7 8.6 16.1-.1 1.1.7 2.1 1.8 2.2 1.1.1 2.1-.7 2.2-1.8 1.1-10.6-5.1-16.5-10.4-19.9-1.6-1-4-1.8-6.7-2.3-2.8-.5-6-.6-9.3-.1-6.7 1-13.8 4.5-17.4 12.8-3.2 7.4-1.7 15.4 1.1 21.9 2.8 6.6 7 12.2 9.8 15.2.7.8 2 .9 2.8.1.8-.7.9-2 .1-2.8-2.6-2.7-6.5-7.9-9.1-14ZM128 71.5c4.4-.1 11.3 1.2 17.5 4.9 6.3 3.8 12 10.2 13.9 20.3 1.2 6.1.7 10.7-1.2 13.9-1.9 3.2-5.1 4.6-8.3 4.6-3.2 0-6.5-1.3-9.1-3.3-2.6-2.1-4.7-5-5.3-8.5-.8-4.7-4.7-7.4-8.6-7.3-2 0-3.8.7-5.2 2.1-1.5 1.4-2.6 3.6-2.8 7-.4 6.6 3.6 12.4 8.7 16.8 2.5 2.1 5.1 3.9 7.4 5.1 2.3 1.2 4 1.8 4.6 1.9 1.1.1 1.8 1.1 1.7 2.2-.1 1.1-1.1 1.8-2.2 1.7-1.3-.2-3.6-1.1-6-2.4-2.4-1.3-5.4-3.2-8.1-5.6-5.5-4.7-10.7-11.7-10.1-20.1.2-4.1 1.7-7.3 3.9-9.5s5.1-3.3 7.9-3.3c5.6-.1 11.4 3.8 12.6 10.6.4 2.3 1.9 4.4 3.9 6 2 1.6 4.5 2.5 6.6 2.5 2.1 0 3.8-.8 4.9-2.7 1.2-2 1.8-5.5.7-11.1-1.7-8.7-6.6-14.2-12.1-17.5-5.6-3.4-11.7-4.5-15.4-4.4h-.1c-5.3-.2-17.6 2.1-24.3 12.1-3.2 5-4.3 11.2-4.2 17.2.1 6 1.4 11.5 2.5 14.6.4 1-.2 2.1-1.2 2.5-1 .4-2.1-.2-2.5-1.2-1.2-3.5-2.6-9.4-2.7-15.8-.1-6.4 1-13.5 4.9-19.4C108 73.8 122 71.3 128 71.5Zm5.8 42.5c3.1 3.6 8.7 6.6 18.6 6 1.1-.1 2 .8 2.1 2 0 1.1-.8 2-1.9 2.1-10.9.6-17.8-2.7-21.9-7.4-4-4.7-5-10.4-4.7-14.3 0-1.1 1-2 2.1-1.9 1.1 0 2 1 1.9 2.1-.2 3.1.6 7.7 3.8 11.4ZM95.2 83.5c-.5 1-1.8 1.3-2.7.7-1-.6-1.3-1.8-.7-2.7 4-6.5 17-19 38.2-19 18 0 30.5 12.6 34.7 18.9.6.9.3 2.2-.6 2.8-.9.6-2.2.3-2.8-.6-3.8-5.7-15.2-17.1-31.3-17.1-19.6 0-31.4 11.5-34.8 17Z"
                                                clip-rule="evenodd"></path>
                                            <path style="fill: #0b4dda" d="M185.9 47H0v12h256V47h-70.1Z"></path>
                                        </g>
                                    </svg>
                                </div>
                                <h4 class="message">Drag and Drop files here</h4>
                                <div class="note">
                                    By submitting data above, you are agreeing to our <a href="#">Terms of Service</a>
                                    and
                                    <a href="#">Privacy Policy</a>, and to the<strong>
                                        sharing of <br />your Sample submission with the security community.</strong>
                                    Please do not submit any personal information; <br />
                                    K-Security is not responsible for the contents of your submission. <a href="#">Learn
                                        more.</a>
                                </div>
                            </div>
                        </form>
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
      function dropHandler(ev) {
        ev.preventDefault();
        if (ev.dataTransfer.items) {
          [...ev.dataTransfer.items].forEach((item, i) => {
            const isFile = item.kind === 'file';
            const isAPK = item.kind === 'application/vnd.android.package-archive';

            if (isFile && isAPK) {
              analyze(item.getAsFile());
            }
          });
        }
      }

      function analyze(file) {
        const formData = new FormData();

        formData.append('file', file);
        notify('Analyzing... This analysis may take a few minutes', 'primary');
        fetch(`/dashboard/analysis/`, {
          method: 'POST',
          body: formData,
        })
          .then((response) => response.json())
          .then((response) => {
            const analysis_id = response['data']['analysis_id']

            notify("Analyze application successfully! We will redirect in a few seconds", 'success');
            setTimeout(() => { location.href = `/dashboard/analysis/${analysis_id}/` }, 1500)
          })
          .catch((error) => notify(error, 'danger'));
      }

      function notify(message, type) {
        const content = {
          title: 'K-Security',
          message: message,
          icon: 'flaticon-alarm-1',
        };

        $.notify(content, {
          type: type,
          placement: {
            from: 'bottom',
            align: 'right',
          },
          time: 1000,
        });
      }

      function dragOverHandler(ev) {
        ev.preventDefault();
      }

      const input = $(document.createElement('input'));

      input.on('change', function () {
        const file = input[0].files[0];

        if (file) {
          analyze(file);
        }
      });
      input.attr('type', 'file');
      input.attr('accept', '.apk');

      $('#apk-files').on('click', function () {
        input.trigger('click');
        return false;
      });
    </script>