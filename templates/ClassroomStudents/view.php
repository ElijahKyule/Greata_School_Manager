<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClassroomStudent $classroomStudent
 */
?>
<div>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($classroomStudent->student->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' Class List'), ['controller'=>'Classrooms', 'action' => 'view', $classroomStudent->classroom->id, '?'=>['tab'=>'classlist']], ['class' => 'btn btn-success float-right fa fa-list']) ?>
        </div>
    </div>
    <div class="column-responsive column-80 content">
        <div class="flex-fill">
            <div class="card card-body d-flex table-responsive" style="padding-top: 0;"> 
            <table width="100%">
                <tr>
                    <th><?= __('Classroom:') ?></th>
                    <td><?= h($classroomStudent->classroom->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Student:') ?></th>
                    <td><?= h($classroomStudent->student->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adm No:') ?></th>
                    <td><?= h($classroomStudent->student->admission_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Classroom Status:') ?></th>
                    <td><?= h($classroomStudent->classroomstatus->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created:') ?></th>
                    <td><?= h($classroomStudent->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified:') ?></th>
                    <td><?= h($classroomStudent->modified) ?></td>
                </tr>
            </table>
            </div>
        </div>
    </div>
</div>
