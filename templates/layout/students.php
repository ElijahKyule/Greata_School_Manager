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
        Students Greata
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->script(['main','jquery/dist/jquery.min', 'js/adminlte.min', 'js1/bootstrap.min', 'datatables/datatables.min']) ?>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'buttons', 'table', 'default', 'css/bootstrap.min', 'font-awesome/css/font-awesome.min', 'fontawesome/css/all.min', 'Ionicons/css/ionicons.min','AdminLTE', 'skins/skin-green.min', 'main']) ?>

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
      
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?= @$this->Html->image($Stdnt->image,["alt"=>"logo", "class"=>"user-image"]) ?> 
              <span class="hidden-xs">
                <?= $this->Identity->get('name'); ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <?= @$this->Html->image($Stdnt->image,["alt"=>"logo", "class"=>"user-image"]) ?> 
                <p class="text-left">
                  <small style="text-transform: lowercase; color: white">
                    <?= $this->Html->link($this->Identity->get('email'), ['controller'=>'Students', 'action' => 'view', $this->Identity->get('id'),'?'=>['tab'=>'profile']], ['style'=>'color:white']) ?> 
                  </small>
                </p>
                <p class="text-left">
                  <small class="text-capitalize" style="color: white">
                    <?= $this->Html->link($this->Identity->get('name'), ['controller'=>'Students', 'action' => 'view', $this->Identity->get('id'),'?'=>['tab'=>'profile']], ['style'=>'color:white']) ?> 
                  </small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <?= $this->Html->link(__(' Profile'), ['controller'=>'Students', 'action' => 'view', $this->Identity->get('id')], ['class' => 'btn btn-default btn-flat fa fa-user']) ?>
                </div>
                <div class="pull-right">
                   <?= $this->Html->link(__(' Sign out'), ['controller'=>'Students', 'action' => 'logout'], ['class' => 'btn btn-default btn-flat fas fa-sign-out-alt']) ?>
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
          <?= @$this->Html->image($Stdnt->image,["alt"=>"logo", "class"=>"img-circle user-image"]) ?> 
        </div>
        <div class="pull-center info">
          <p >
            <?= $this->Html->link($this->Identity->get('name'), ['controller'=>'Students', 'action' => 'view', $this->Identity->get('id'),'?'=>['tab'=>'profile']]) ?> 
          </p>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main Menu</li>
        <li><?= $this->Html->link('<i class="fa fa-home"></i> <span>Dashboard</span>', ['controller'=>'Pages', 'action'=>'home'], ['escape' => false]) ?></li>
        <li><?= $this->Html->link('<i class="fa fa-user"></i> <span>My Profile</span>', ['controller'=>'Students', 'action'=>'viewProfile', $this->Identity->get('id')], ['escape' => false]) ?></li>
        <li><?= $this->Html->link('<i class="fas fa-file-alt"></i> <span>Subjects</span>', ['controller'=>'Students', 'action'=>'viewSubjects', $this->Identity->get('id')], ['escape' => false]) ?></li>
        <li><?= $this->Html->link('<i class="fas fa-money"></i> <span>Payments</span>', ['controller'=>'Students', 'action'=>'viewPayments', $this->Identity->get('id')], ['escape' => false]) ?></li>
        <li><?= $this->Html->link('<i class="fas fa-book-reader"></i> <span>Exams</span>', ['controller'=>'Students', 'action'=>'viewExams', $this->Identity->get('id')], ['escape' => false]) ?></li>
        <li><?= $this->Html->link('<i class="fas fa-comment-alt"></i> <span>Messages</span>', ['controller'=>'Students', 'action'=>'viewMessages', $this->Identity->get('id')], ['escape' => false]) ?>
        </li>
        <li><?= $this->Html->link('<i class="fas fa-wheelchair"></i> <span>Activities</span>', ['controller'=>'Students', 'action'=>'viewActivities', $this->Identity->get('id')], ['escape' => false]) ?></li>
      </ul>
    </section>
    </aside>

    <main class="main">
        <div class="content-wrapper">
            <section class="container-fluid">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </section>
        </div>
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
    $('.table2').DataTable( {
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>rtip",
    } );
} );
</script>
<script>
  $(document).ready(function() {
    $('.table3').DataTable( {
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>rtip",
    } );
} );
</script>
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
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
        });
        calendar.render();
      });

    </script>
</body>
</html>
