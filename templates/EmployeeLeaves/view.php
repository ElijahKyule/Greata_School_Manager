<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeLeave $employeeLeave
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($employeeLeave->leave->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['controller'=>'Employees', 'action' => 'view', $employeeLeave->employee->id,'?'=>['tab'=>'leaves']], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>
    </div>
    <div class="column-responsive column-80">
        <div class="employeeLeaves view content">
           <div class="card flex-fill">
            <div class="card-header">
                <h4><?= __('Details') ?></h4>
            </div>
            <div class="card-body d-flex table-responsive">
            <table width="100%">
                <tr>
                    <th><?= __('Employee:') ?></th>
                    <td><?= $employeeLeave->has('employee') ? $this->Html->link($employeeLeave->employee->name, ['controller' => 'Employees', 'action' => 'view', $employeeLeave->employee->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Leave:') ?></th>
                    <td><?= $employeeLeave->has('leave') ? $this->Html->link($employeeLeave->leave->name, ['controller' => 'Leaves', 'action' => 'view', $employeeLeave->leave->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Description:') ?></th>
                    <td><?= $this->Text->autoParagraph(h($employeeLeave->description)); ?></td>
                </tr>
                 <tr>
                    <th><?= __('Duration:') ?></th>
                    <td><?= $this->Number->format($employeeLeave->duration) ?></td>
                </tr>
                <tr>
                    <th><?= __('Duration Measure:') ?></th>
                    <td><?= $employeeLeave->has('measure') ? $this->Html->link($employeeLeave->measure->name, ['controller' => 'Measures', 'action' => 'view', $employeeLeave->measure->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Authorized By:') ?></th>
                    <td><?= $employeeLeave->has('user') ? $this->Html->link($employeeLeave->user->name, ['controller' => 'Users', 'action' => 'view', $employeeLeave->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created:') ?></th>
                    <td><?= h($employeeLeave->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified:') ?></th>
                    <td><?= h($employeeLeave->modified) ?></td>
                </tr>
            </table>
          </div>
       
        </div>
    </div>