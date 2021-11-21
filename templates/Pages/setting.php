    <div class="container-fluid"> 
      <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading">
              <i class="fa fa-wrench"></i>
              <?= __(' System Settings') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success fa fa-home']) ?>
        </div>
      </div> 

      <div class="content setup" style="min-height: 100px !important;">
        <div class="row" style="padding-left: 10px">
          <div class=" col-md-6 col-lg-6 col-xl-6">
            <div class="card card-body text-muted" style="margin: 0;">
          	<ul style="list-style: none; font-weight: bold; font-size: 12px; color: black">
              <li>
                <?= $this->Html->link(__('&nbsp; User Management'),['controller'=>'Users','action'=> 'index'], ['class' => 'fa fa-users', 'escape' => false]) ?>
              </li>
          	</ul>
            </div>
          </div>

          <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="card card-body text-muted" style="height: auto; margin: 0">
            <ul style="list-style: none; font-weight: bold; font-size: 12px; color: black">
              <li>
                <?= $this->Html->link(__('&nbsp; System Configurations'), ['controller'=>'Settings', 'action' => 'config', 1], ['class' => 'fa fa-wrench', 'escape' => false]) ?>
              </li>
            </ul>
            </div>
          </div>

        </div>
      </div>
    </div>