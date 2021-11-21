
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($role->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
             <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $role->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>

   <div class="column-responsive column-80 content"> 
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#role_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#roles_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fas fa-user-friends" style="padding-right: 5px;"></i>Related Users
              </a>
            </li> 
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#employees_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fas fa-user-tie" style="padding-right: 5px;"></i>Related Employees
              </a>
            </li>   
        </ul>

        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane active" id="role_details">
                <div class="card flex-fill">
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-md-2" style="width: 100%; padding: 20px;">
                                <span><i class="fa-10x fa fa-user" style="float: left"></i></span>
                            </div>
                            <div class="col-md-10"  style="width: 100%">
                                <table class="" width="100%">
                                    <tr>
                                        <th><?= __('Name:') ?></th>
                                        <td><?= h($role->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Created:') ?></th>
                                        <td><?= h($role->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modified:') ?></th>
                                        <td><?= h($role->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="roles_related">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add user with related role:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Users', 'action' => 'add'], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                                <div class="table-responsive">
                                    <table class='table table-striped table-condensed' width="100%">
                                        <thead>
                                        <tr>
                                            <th><?= __('Id') ?></th>
                                            <th><?= __('Name') ?></th>
                                            <th><?= __('Email') ?></th>
                                            <th><?= __('Phone Number') ?></th>
                                            <th><?= __('Address') ?></th>
                                            <th><?= __('Gender') ?></th>
                                            <th><?= __('Created') ?></th>
                                            <th><?= __('Modified') ?></th>
                                            <th class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($role->users as $users) : ?>
                                        <tr>
                                            <td><?= h($users->id) ?></td>
                                            <td><?= $this->Html->link($users->name, ['controller' => 'Users', 'action' => 'view', $users->id]) ?></td>
                                            <td><?= h($users->email) ?></td>
                                            <td><?= h($users->phone_number) ?></td>
                                            <td><?= h($users->address) ?></td>
                                            <td><?= h($users->gender->name) ?></td>
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
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Name') ?></th>
                                        <th><?= __('Salary Amount') ?></th>
                                        <th><?= __('Employment Date') ?></th>
                                        <th><?= __('Gender') ?></th>
                                        <th><?= __('Status') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($role->employees as $employee) : ?>
                                    <tr>
                                        <td><?= h($employee->id) ?></td>
                                        <td><?= $this->Html->link($employee->name, ['controller' => 'Employees', 'action' => 'view', $employee->id, '?'=>['tab'=>'profile']]) ?></td>
                                        <td><?= h($employee->salary_amount) ?></td>
                                        <td><?= h($employee->employment_date) ?></td>
                                        <td><?= h($employee->gender->name) ?></td>
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