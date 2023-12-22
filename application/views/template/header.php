<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ErixPelangi | <?= $judul ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
 
    <div class="wrapper">
        <header class="main-header">
            <a href="<?=site_url('dashboard')?>" class="logo">
                <span class="logo-mini">m<b>P</b></span>
                <span class="logo-lg">Erix<b>PELANGI</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
 
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image">
                                <span class="hidden-xs"><?= $this->fungsi->user_login()->name  ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle">
                                    <p><?= $this->fungsi->user_login()->name  ?>
                                        <small><?= $this->fungsi->user_login()->address  ?></small>
                                        <small><?= $this->fungsi->user_login()->phone   ?></small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?=site_url('auth/logout')?>" class="btn btn-flat bg-red">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
 
        <!-- Left side column -->
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle">
                    </div>
                    <div class="pull-left info">
                        <p><?= $this->fungsi->user_login()->name  ?></p>
                        <i class="fa fa-circle text-success"></i> Online
                    </div>
                </div>
                <!-- sidebar menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                    </li>
                    <li <?=$this->uri->segment(1) == 'customer' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('customer')?>">
                            <i class="fa fa-users"></i> <span>Customers</span>
                        </a>
                    </li>
                    <?php if($this->fungsi->user_login()->level == 1) {?>
                    <li <?=$this->uri->segment(1) == 'service' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('service')?>">
                            <i class="fa fa-scissors"></i> <span>Services</span>
                        </a>
                    </li>
                    <li <?=$this->uri->segment(1) == 'employee' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('employee')?>"><i class="fa fa-user"></i> <span>Employee</span></a>
                    </li>
                    <?php } ?>
                    <li <?=$this->uri->segment(1) == 'sales' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('sales/index')?>">
                            <i class="fa fa-dollar"></i> <span>Sales Data</span>
                        </a>
                    </li>
                    <?php if($this->fungsi->user_login()->level == 1) {?>
                    <li class="header">Report</li>
                    <li <?=$this->uri->segment(1) == 'laporan' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('laporan/index')?>">
                            <i class="fa fa-file"></i> <span>Sales Report</span>
                        </a>
                    </li>
                    <?php } ?>
                    
                </ul>
            </section>
        </aside>
 
        <!-- Content Wrapper -->
        <div class="content-wrapper">
        

