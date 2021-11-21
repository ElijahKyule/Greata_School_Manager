<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentActivity $studentActivity
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($studentActivity->activity->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['controller'=>'Students', 'action' => 'view', $studentActivity->student->id, '?'=>['tab'=>'activities']], ['class' => 'btn btn-success float-right fa fa-list']) ?>
        </div>
    </div>
    <div class="column-responsive column-80">
        <div class="studentActivities view content">
           <div class="card flex-fill">
            <div class="card-header">
                <h4><?= __('Student Activity Details') ?></h4>
            </div>
            <div class="card-body d-flex table-responsive">
            <table width="100%">
                <tr>
                    <th><?= __('Student') ?></th>
                    <td><?= $studentActivity->has('student') ? $this->Html->link($studentActivity->student->name, ['controller' => 'Students', 'action' => 'view', $studentActivity->student->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Activity') ?></th>
                    <td><?= $studentActivity->has('activity') ? $this->Html->link($studentActivity->activity->name, ['controller' => 'Activities', 'action' => 'view', $studentActivity->activity->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $studentActivity->has('status') ? $this->Html->link($studentActivity->status->name, ['controller' => 'Statuses', 'action' => 'view', $studentActivity->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Achieved') ?></th>
                    <td><?= $this->Number->format($studentActivity->achieved) ?></td>
                </tr>
                <tr>
                    <th><?= __('Measure') ?></th>
                    <td><?= h($studentActivity->measure->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start') ?></th>
                    <td><?= h($studentActivity->start) ?></td>
                </tr>
                <tr>
                    <th><?= __('End') ?></th>
                    <td><?= h($studentActivity->end) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($studentActivity->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($studentActivity->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>