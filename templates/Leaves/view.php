<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Leave $leave
 */ 
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($leave->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $leave->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leave->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $leave->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>
   <div class="column-responsive column-80 content"> 
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#leave_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#employees_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fa fa-users" style="padding-right: 5px;"></i>Employees
              </a>
            </li> 
        </ul>

        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane active" id="leave_details">
                <div class="card flex-fill">
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-md-2" style="width: 100%; padding: 20px;">
                                <span><i class="fa-10x fas fa-sign-out-alt" style="float: left"></i></span>
                            </div>
                            <div class="col-md-10"  style="width: 100%">
                               <table width="100%">
                                    <tr>
                                        <th><?= __('Name:') ?></th>
                                        <td><?= h($leave->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Created:') ?></th>
                                        <td><?= h($leave->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modified:') ?></th>
                                        <td><?= h($leave->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="employees_related">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Name') ?></th>
                                        <th><?= __('Duration') ?></th>
                                        <th><?= __('Duration Measure') ?></th>
                                        <th><?= __('Description') ?></th>
                                        <th><?= __('Authorized By') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($leave->employee_leaves as $employeeLeave) : ?>
                                    <tr>
                                        <td><?= h($employeeLeave->id) ?></td>
                                        <td><?= $this->Html->link($employeeLeave->employee->name, ['controller' => 'Employees', 'action' => 'view', $employeeLeave->employee->id, '?'=>['tab'=>'leaves']]) ?></td>
                                        <td><?= h($employeeLeave->duration) ?></td>
                                        <td><?= h($employeeLeave->measure->name) ?></td>
                                        <td><?= h($employeeLeave->description) ?></td>
                                        <td><?= h($employeeLeave->user->name) ?></td>
                                        <td><?= h($employeeLeave->created) ?></td>
                                        <td><?= h($employeeLeave->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Employees', 'action' => 'view', $employeeLeave->employee->id, '?'=>['tab'=>'leaves']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>