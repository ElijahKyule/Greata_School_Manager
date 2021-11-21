<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Admin Greata
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->script(['jquery/dist/jquery.min', 'js/adminlte.min', 'js1/bootstrap.min', 'datatables/datatables.min']) ?>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'buttons', 'table', 'default', 'css/bootstrap.min', 'font-awesome/css/font-awesome.min', 'fontawesome/css/all.min', 'Ionicons/css/ionicons.min','AdminLTE', 'skins/skin-green.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b>G</b>S</span>
      <span class="logo-lg"><b>Greata </b>Schools</span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu"> 
      
        <ul class="nav navbar-nav" style="float:right; margin-top: 8px;">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?= @$this->Html->image($use->image,["alt"=>"logo", "class"=>"user-image img-circle"]) ?> 
              <span class="hidden-xs">
                <?= $this->Identity->get('name'); ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <?= @$this->Html->image($user->image,["alt"=>"logo", "class"=>"user-image"]) ?> 
                <p class="text-left">
                  <small style="text-transform: lowercase; color: white">
                    <?= $this->Html->link($this->Identity->get('email'), ['controller'=>'Users', 'action' => 'view', $this->Identity->get('id'),'?'=>['tab'=>'profile']], ['style'=>'color:white']) ?> 
                  </small>
                </p>
                <p class="text-left">
                  <small class="text-capitalize" style="color: white">
                    <?= $this->Html->link($this->Identity->get('name'), ['controller'=>'Users', 'action' => 'view', $this->Identity->get('id'),'?'=>['tab'=>'profile']], ['style'=>'color:white']) ?> 
                  </small>
                </p>
                <p class="text-left">
                  <small class="text-capitalize">
                    <?= $rolee; ?>
                  </small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <?= $this->Html->link(__(' Profile'), ['controller'=>'Users', 'action' => 'view', $this->Identity->get('id')], ['class' => 'btn btn-default btn-flat fa fa-user']) ?>
                </div>
                <div class="pull-right">
                   <?= $this->Html->link(__(' Sign out'), ['controller'=>'Users', 'action' => 'logout'], ['class' => 'btn btn-default btn-flat fas fa-sign-out-alt']) ?>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

    <aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel" style="min-height: 10vh;">
        <div class="pull-left image">
          <?= @$this->Html->image($use->image,["alt"=>"logo", "class"=>"user-image img-circle"]) ?> 
        </div>
        <div class="pull-center info">
          <p >
            <?= $this->Html->link($this->Identity->get('name'), ['controller'=>'Users', 'action' => 'view', $this->Identity->get('id'),'?'=>['tab'=>'profile']]) ?> 
          </p>
          <p >
            <?= $rolee; ?>
          </p>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main Menu</li>
        <li><?= $this->Html->link('<i class="fa fa-home"></i> <span>Dashboard</span>', ['controller'=>'Pages', 'action'=>'home'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link('<i class="fa fa-users"></i> <span>Students</span>', ['controller'=>'Students', 'action' => 'index'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link('<i class="fa fa-landmark"></i> <span>Classes</span>', ['controller'=>'Classrooms', 'action' => 'index'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link('<i class="fas fa-book-reader"></i> <span>   Subjects</span>', ['controller'=>'Subjects', 'action' => 'index'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link('<i class="far fa-file-alt"></i> <span>   Exams</span>', ['controller'=>'Exams', 'action' => 'index'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link('<i class="fa fa-money"></i> <span>   Fees</span>', ['controller'=>'Fees', 'action' => 'index'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link('<i class="fa fa-bell"></i> <span>Announcements & Events</span>', ['controller'=>'Announcements', 'action' => 'index'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link('<i class="fas fa-cog"></i> <span>Setup</span>', ['controller'=>'Pages', 'action' => 'setup'], ['escape' => false]) ?></li>
      </ul>
    </section>
    </aside>

    <main class="main">
         <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="container-fluid">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </main>

     <footer class="main-footer">
        <div class="hidden-xs">
            <span>
                Copyright &copy; 2021. <b class="text-primary">Greata School.</b>
                Powered by: <b class="text-primary">TheeSoftwares</b>
            </span>
        </div>  
    </footer>
</div>
<!-- ./wrapper -->
<?= $this->Html->script(['datatables/datatables.min']) ?>
<script>
  $(document).ready(function() {
    $('.table').DataTable( {
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>rtip",
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script>
  $(document).ready(function() {
    $('.table-marks').DataTable( {
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>rtip",
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "paginate" : false,
        "searching" : false,
        "info" : false
    } );
} );
</script>
</body>
</html>
