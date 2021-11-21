<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentSubject $studentSubject
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($studentSubject->subject->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['controller'=>'Students', 'action' => 'view', $studentSubject->student->id, '?'=>['tab'=>'subjects']], ['class' => 'btn btn-success float-right fa fa-list']) ?>
        </div>
    </div>
    <div class="column-responsive column-80">
        <div class="studentSubjects view content">
           <div class="card flex-fill">
            <div class="card-header">
                <h4><?= __('Student Subject Details') ?></h4>
            </div>
            <div class="card-body d-flex table-responsive">
            <table width="100%">
                <tr>
                    <th><?= __('Student:') ?></th>
                    <td><?= $studentSubject->has('student') ? $this->Html->link($studentSubject->student->name, ['controller' => 'Students', 'action' => 'view', $studentSubject->student->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Subject:') ?></th>
                    <td><?= $studentSubject->has('subject') ? $this->Html->link($studentSubject->subject->name, ['controller' => 'Subjects', 'action' => 'view', $studentSubject->subject->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Subject Teacher:') ?></th>
                    <td><?= $this->Html->link($studentSubject->subject->user->name, ['controller' => 'Subjects', 'action' => 'view', $studentSubject->subject->user->id]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created:') ?></th>
                    <td><?= h($studentSubject->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified:') ?></th>
                    <td><?= h($studentSubject->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>