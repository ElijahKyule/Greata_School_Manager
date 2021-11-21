<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClassroomActivity $classroomActivity
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($classroomActivity->activity->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['controller'=>'Classrooms', 'action' => 'view', $classroomActivity->classroom->id, '?'=>['tab'=>'activities']], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>
    </div>
    <div class="column-responsive column-80">
        <div class="classroomActivities view content">
           <div class="card flex-fill">
            <div class="card-header">
                <h4><?= __('Details') ?></h4>
            </div>
            <div class="card-body d-flex table-responsive">
            <table width="100%">
                <tr>
                    <th><?= __('Classroom:') ?></th>
                    <td><?= $classroomActivity->has('classroom') ? $this->Html->link($classroomActivity->classroom->name, ['controller' => 'Classrooms', 'action' => 'view', $classroomActivity->classroom->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Activity"') ?></th>
                    <td><?= $classroomActivity->has('activity') ? $this->Html->link($classroomActivity->activity->name, ['controller' => 'Activities', 'action' => 'view', $classroomActivity->activity->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status:') ?></th>
                    <td><?= $classroomActivity->has('status') ? $this->Html->link($classroomActivity->status->name, ['controller' => 'Statuses', 'action' => 'view', $classroomActivity->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Measure:') ?></th>
                    <td><?= $classroomActivity->has('measure') ? $this->Html->link($classroomActivity->measure->name, ['controller' => 'Measures', 'action' => 'view', $classroomActivity->measure->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Achieved:') ?></th>
                    <td><?= $this->Number->format($classroomActivity->achieved) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start:') ?></th>
                    <td><?= h($classroomActivity->start) ?></td>
                </tr>
                <tr>
                    <th><?= __('End:') ?></th>
                    <td><?= h($classroomActivity->end) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created:') ?></th>
                    <td><?= h($classroomActivity->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified:') ?></th>
                    <td><?= h($classroomActivity->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>