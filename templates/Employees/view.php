<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($employee->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $employee->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>
<?php
$tab_employee_detail_status = 'active';
$tab_leave_details_status = '';

if ($tab == 'profile' ) 
{
    $tab_employee_detail_status = 'active';
    $tab_leave_details_status = '';
}
elseif ($tab == 'leaves' ) 
{
    $tab_employee_detail_status = '';
    $tab_leave_details_status = 'active';
}
?>
<div class="column-responsive column-80 content"> 
   <!--  <div id="content"> -->
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#employee_details" data-toggle="tab" class="btn btn-link"  style="font-size: 12px;">
                <i class="fa fa-user" style="padding-right: 3px;"></i>Profile
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#leave_details" data-toggle="tab" class="btn btn-link" style="font-size: 12px;">
                <i class="fas fa-sign-out-alt" style="padding-right: 3px;"></i>Leaves
              </a>
            </li>
        </ul>
        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane <?= $tab_employee_detail_status ?>" id="employee_details">
                <div class="card flex-fill">
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-md-2 card" style="width: 100%; padding: 20px;">
                                <?= @$this->Html->image($employee->image) ?> 
                                <?= $this->Form->create($employee,['type'=>'file', "url"=>["action"=>"uploadImage", $id]]) ?>
                                <fieldset>
                                    <?php 
                                        echo $this->Form->control('employee_image', ['type'=>'file']);
                                    ?>
                                </fieldset>
                                <?= $this->Form->button(__('Upload'), ['class'=>'btn btn-success submit fas fa-upload']) ?>
                                <?= $this->Form->end() ?>
                            </div>
                            <div class="col-md-10"  style="width: 100%">
                                <table width="100%">
                                    <tr>
                                        <th><?= __('Name:') ?></th>
                                        <td><?= h($employee->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Email:') ?></th>
                                        <td><?= h($employee->email) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Phone Number:') ?></th>
                                        <td><?= h($employee->phone_number) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Address:') ?></th>
                                        <td><?= h($employee->address) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Gender:') ?></th>
                                        <td><?= $employee->has('gender') ? $this->Html->link($employee->gender->name, ['controller' => 'Genders', 'action' => 'view', $employee->gender->id]) : '' ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Role:') ?></th>
                                        <td><?= $employee->has('role') ? $this->Html->link($employee->role->name, ['controller' => 'Roles', 'action' => 'view', $employee->role->id]) : '' ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Qualifications:') ?></th>
                                        <td><?= $this->Text->autoParagraph(h($employee->qualifications)); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Status:') ?></th>
                                        <td><?= $employee->has('status') ? $this->Html->link($employee->status->name, ['controller' => 'Statuses', 'action' => 'view', $employee->status->id]) : '' ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Salary Amount:') ?></th>
                                        <td><?= $this->Number->format($employee->salary_amount) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Date Of Birth:') ?></th>
                                        <td><?= h($employee->date_of_birth) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Employment Date:') ?></th>
                                        <td><?= h($employee->employment_date) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Created:') ?></th>
                                        <td><?= h($employee->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modified:') ?></th>
                                        <td><?= h($employee->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="tab-pane <?= $tab_leave_details_status ?>" id="leave_details">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add Leave:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'EmployeeLeaves', 'action' => 'add', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                 <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                        <tr>
                                            <th><?= $this->Paginator->sort('id') ?></th>
                                            <th><?= $this->Paginator->sort('leave_id') ?></th>
                                            <th><?= $this->Paginator->sort('description') ?></th>
                                            <th><?= $this->Paginator->sort('duration') ?></th>
                                            <th><?= $this->Paginator->sort('duration_measure') ?></th>
                                            <th><?= $this->Paginator->sort('authorized_by') ?></th>
                                            <th><?= $this->Paginator->sort('created') ?></th>
                                            <th><?= $this->Paginator->sort('modified') ?></th>
                                            <th class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($employee->employee_leaves as $employeeLeave): ?>
                                        <tr>
                                            <td><?= $this->Number->format($employeeLeave->id) ?></td>
                                            <td><?= $employeeLeave->has('leave') ? $this->Html->link($employeeLeave->leave->name, ['controller' => 'EmployeeLeaves', 'action' => 'view', $employeeLeave->id]) : '' ?></td>
                                            <td><?= h($employeeLeave->description) ?></td>
                                            <td><?= $this->Number->format($employeeLeave->duration) ?></td>
                                            <td><?= h($employeeLeave->measure->name) ?></td>
                                            <td><?= h($employeeLeave->user->name) ?></td>
                                            <td><?= h($employeeLeave->created) ?></td>
                                            <td><?= h($employeeLeave->modified) ?></td>
                                            <td class="actions">
                                                <?= $this->Html->link('', ['controller'=>'EmployeeLeaves', 'action' => 'view', $employeeLeave->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                                <?= $this->Html->link('', ['controller'=>'EmployeeLeaves', 'action' => 'edit', $employeeLeave->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                                <?= $this->Form->postLink('', ['controller'=>'EmployeeLeaves', 'action' => 'delete', $employeeLeave->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeLeave->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
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