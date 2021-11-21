<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classroomstatus $classroomstatus
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($classroomstatus->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $classroomstatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classroomstatus->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $classroomstatus->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>

   <div class="column-responsive column-80 content"> 
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#classroomstatus_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#classroom_students_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fa fa-users" style="padding-right: 5px;"></i>Classroom Students
              </a>
            </li> 
        </ul>

        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane active" id="classroomstatus_details">
                <div class="card flex-fill">
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-md-2" style="width: 100%; padding: 20px;">
                                <span><i class="fa-10x fa fa-toggle-off" style="float: left"></i></span>
                            </div>
                            <div class="col-md-10"  style="width: 100%">
                                <table>
                                    <tr>
                                        <th><?= __('Name:') ?></th>
                                        <td><?= h($classroomstatus->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Created:') ?></th>
                                        <td><?= h($classroomstatus->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modified:') ?></th>
                                        <td><?= h($classroomstatus->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="classroom_students_related">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Classroom') ?></th>
                                        <th><?= __('Student') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($classroomstatus->classroom_students as $classroomStudents) : ?>
                                    <tr>
                                        <td><?= h($classroomStudents->classroom->id) ?></td>
                                        <td><?= $this->Html->link($classroomStudents->classroom->name, ['controller' => 'Classrooms','action'=> 'view', $classroomStudents->classroom->id, '?'=>['tab'=>'classlist']]) ?></td>
                                        <td><?= h($classroomStudents->student->name) ?></td>
                                        <td><?= h($classroomStudents->created) ?></td>
                                        <td><?= h($classroomStudents->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Classrooms', 'action' => 'view', $classroomStudents->classroom->id, '?'=>['tab'=>'classlist']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
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
