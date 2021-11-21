 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeLeave[]|\Cake\Collection\CollectionInterface $employeeLeaves
 */
?>
<div class="employeeLeaves index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Employee Leaves') ?></h3>
</div>
<div class="employeeLeaves index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('employee_id') ?></th>
                    <th><?= $this->Paginator->sort('leave_id') ?></th>
                    <th><?= $this->Paginator->sort('duration') ?></th>
                    <th><?= $this->Paginator->sort('measure_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employeeLeaves as $employeeLeave): ?>
                <tr>
                    <td><?= $this->Number->format($employeeLeave->id) ?></td>
                    <td><?= $employeeLeave->has('employee') ? $this->Html->link($employeeLeave->employee->name, ['controller' => 'Employees', 'action' => 'view', $employeeLeave->employee->id]) : '' ?></td>
                    <td><?= $employeeLeave->has('leave') ? $this->Html->link($employeeLeave->leave->name, ['controller' => 'Leaves', 'action' => 'view', $employeeLeave->leave->id]) : '' ?></td>
                    <td><?= $this->Number->format($employeeLeave->duration) ?></td>
                    <td><?= $employeeLeave->has('measure') ? $this->Html->link($employeeLeave->measure->name, ['controller' => 'Measures', 'action' => 'view', $employeeLeave->measure->id]) : '' ?></td>
                    <td><?= $employeeLeave->has('user') ? $this->Html->link($employeeLeave->user->name, ['controller' => 'Users', 'action' => 'view', $employeeLeave->user->id]) : '' ?></td>
                    <td><?= h($employeeLeave->created) ?></td>
                    <td><?= h($employeeLeave->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $employeeLeave->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $employeeLeave->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $employeeLeave->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeLeave->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
