<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gender $gender
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($gender->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $gender->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gender->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $gender->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>
   <div class="column-responsive column-80 content"> 
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#gender_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#students_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fa fa-users" style="padding-right: 5px;"></i>Students
              </a>
            </li> 
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#users_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fa fa-user-friends" style="padding-right: 5px;"></i>Users
              </a>
            </li>  
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#employees_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fas fa-user-tie" style="padding-right: 5px;"></i>Employees
              </a>
            </li>  
        </ul>

        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane active" id="gender_details">
                <div class="card flex-fill">
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-md-2" style="width: 100%; padding: 20px;">
                                <span><i class="fa-10x fas fa-venus-double" style="float: left"></i></span>
                            </div>
                            <div class="col-md-10"  style="width: 100%">
                               <table width="100%">
                                    <tr>
                                        <th><?= __('Name:') ?></th>
                                        <td><?= h($gender->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Created:') ?></th>
                                        <td><?= h($gender->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modified:') ?></th>
                                        <td><?= h($gender->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="students_related">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add related Student:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Students', 'action' => 'add'], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Name') ?></th>
                                        <th><?= __('Adm NO') ?></th>
                                        <th><?= __('DOB') ?></th>
                                        <th><?= __('Address') ?></th>
                                        <th><?= __('Status') ?></th>
                                        <th><?= __('Adm Date') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($gender->students as $students) : ?>
                                    <tr>
                                        <td><?= h($students->id) ?></td>
                                        <td><?= $this->Html->link($students->name, ['controller' => 'Students', 'action' => 'view', $students->id]) ?></td>
                                        <td><?= h($students->admission_number) ?></td>
                                        <td><?= h($students->date_of_birth) ?></td>
                                        <td><?= h($students->address) ?></td>
                                        <td><?= h($students->status->name) ?></td>
                                        <td><?= h($students->admission_date) ?></td>
                                        <td><?= h($students->created) ?></td>
                                        <td><?= h($students->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Students', 'action' => 'view', $students->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
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

            <div class="tab-pane" id="users_related">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add related user:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Users', 'action' => 'add'], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Name') ?></th>
                                        <th><?= __('Email') ?></th>
                                        <th><?= __('Address') ?></th>
                                        <th><?= __('Role') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($gender->users as $users) : ?>
                                    <tr>
                                        <td><?= h($users->id) ?></td>
                                        <td><?= $this->Html->link($users->name, ['controller' => 'Users', 'action' => 'view', $users->id]) ?></td>
                                        <td><?= h($users->email) ?></td>
                                        <td><?= h($users->address) ?></td>
                                        <td><?= h($users->role->name) ?></td>
                                        <td><?= h($users->created) ?></td>
                                        <td><?= h($users->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Users', 'action' => 'view', $users->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
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

            <div class="tab-pane" id="employees_related">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add related employee:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Employees', 'action' => 'add'], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Name') ?></th>
                                        <th><?= __('Salary Amount') ?></th>
                                        <th><?= __('Employment Date') ?></th>
                                        <th><?= __('Role') ?></th>
                                        <th><?= __('Status') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($gender->employees as $employee) : ?>
                                    <tr>
                                        <td><?= h($employee->id) ?></td>
                                        <td><?= $this->Html->link($employee->name, ['controller' => 'Employees', 'action' => 'view', $employee->id, '?'=>['tab'=>'profile']]) ?></td>
                                        <td><?= h($employee->salary_amount) ?></td>
                                        <td><?= h($employee->employment_date) ?></td>
                                        <td><?= h($employee->role->name) ?></td>
                                        <td><?= h($employee->status->name) ?></td>
                                        <td><?= h($employee->created) ?></td>
                                        <td><?= h($employee->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Employees', 'action' => 'view', $employee->id, '?'=>['tab'=>'profile']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
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