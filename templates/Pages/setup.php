    <div class="container-fluid"> 
      <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading">
              <i class="fas fa-cog"></i>
              <?= __(' Setup') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success fa fa-home']) ?>
        </div>
      </div> 

      <div class="content setup">
        <div class="row" style="padding-left: 10px">
          <div class=" col-md-6 col-lg-6 col-xl-6">
            <div class="card card-body text-muted" style="margin: 0;">
          	<ul style="list-style: none; font-weight: bold; font-size: 12px; color: black">
              <li>
                <?= $this->Html->link(__('&nbsp; System Settings'),['controller'=>'Pages','action'=> 'setting'], ['class' => 'fas fa-tools', 'escape' => false]) ?>
              </li>
              <li>
                <?= $this->Html->link(__('&nbsp; Employees'),['controller'=>'Employees','action'=> 'index'], ['class' => 'fas fa-user-tie', 'escape' => false]) ?>
              </li>
          		<li>
          			<?= $this->Html->link(__('&nbsp; User Roles'), ['controller'=>'Roles', 'action' => 'index'], ['class' => 'fas fa-exchange-alt', 'escape' => false]) ?>
          		</li>
          		<li>
          			<?= $this->Html->link(__('&nbsp; Class Streams'), ['controller'=>'Streams', 'action' => 'index'], ['class' => 'fa fa-stream', 'escape' => false]) ?>
          		</li>
              <li>
                <?= $this->Html->link(__('&nbsp; Class Levels'), ['controller'=>'Levels', 'action' => 'index'], ['class' => 'fa fa-cubes', 'escape' => false]) ?>
              </li>
              <li>
                <?= $this->Html->link(__('&nbsp; Statuses'), ['controller'=>'Statuses', 'action' => 'index'], ['class' => 'fa fa-toggle-on', 'escape' => false]) ?>
              </li>
              <li>
                <?= $this->Html->link(__('&nbsp; Student Class Statuses'), ['controller'=>'Classroomstatuses', 'action' => 'index'], ['class' => 'fa fa-toggle-off', 'escape' => false]) ?>
              </li>
              <li>
                <?= $this->Html->link(__('&nbsp; Exam Types'), ['controller'=>'Examtypes', 'action' => 'index'], ['class' => 'fa fa-list', 'escape' => false]) ?>
              </li>
              <li>
                <?= $this->Html->link(__('&nbsp; Fee Structure Parameters'), ['controller'=>'FeeStructureParameters', 'action' => 'index'], ['class' => 'fas fa-ellipsis-v', 'escape' => false]) ?>
              </li>
              <li>
                <?= $this->Html->link(__('&nbsp; Payment Modes'), ['controller'=>'Paymentmodes', 'action' => 'index'], ['class' => 'fas fa-sliders-h', 'escape' => false]) ?>
              </li>
          	</ul>
            </div>
          </div>

          <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="card card-body text-muted" style="height: auto; margin: 0">
            <ul style="list-style: none; font-weight: bold; font-size: 12px; color: black">
              <li>
                <?= $this->Html->link(__('&nbsp; Message Statuses'), ['controller'=>'Messagestatuses', 'action' => 'index'], ['class' => 'fa fa-flag', 'escape' => false]) ?>
              </li>
              <li>
                <?= $this->Html->link(__('&nbsp; Terms/Programs'), ['controller'=>'Terms', 'action' => 'index'], ['class' => 'fas fa-level-up-alt', 'escape' => false]) ?>
              </li>
              <li>
                <?= $this->Html->link(__('&nbsp; Units Of Measures'), ['controller'=>'Measures', 'action' => 'index'], ['class' => 'fas fa-balance-scale', 'escape' => false]) ?>
              </li> 
              <li>
                <?= $this->Html->link(__('&nbsp; Activities'), ['controller'=>'Activities', 'action' => 'index'], ['class' => 'fa fa-wheelchair', 'escape' => false]) ?>
              </li> 
              <li>
                <?= $this->Html->link(__('&nbsp; Genders'), ['controller'=>'Genders', 'action' => 'index'], ['class' => 'fas fa-venus-double', 'escape' => false]) ?>
              </li>
              <li>
                <?= $this->Html->link(__('&nbsp; Employee Leave Parameters'), ['controller'=>'Leaves', 'action' => 'index'], ['class' => 'fas fa-sign-out-alt', 'escape' => false]) ?>
              </li>  
              <li>
                <?= $this->Html->link(__('&nbsp; Grades'), ['controller'=>'Grades', 'action' => 'index'], ['class' => 'fas fa-book-open', 'escape' => false]) ?>
              </li>  
            </ul>
            </div>
          </div>

        </div>
      </div>
    </div>