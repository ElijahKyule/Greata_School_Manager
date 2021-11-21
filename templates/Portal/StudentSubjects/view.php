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
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $studentSubject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentSubject->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $studentSubject->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>
    
    <div class="tab-pane <?= $tab_subject_details_status?>" id="subject_details">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add subject:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'StudentSubjects', 'action' => 'add', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                 <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                        <tr>
                                            <th><?= $this->Paginator->sort('id') ?></th>
                                            <th><?= $this->Paginator->sort('subject_id') ?></th>
                                            <th><?= __('Subject Teacher') ?></th>
                                            <th><?= $this->Paginator->sort('created') ?></th>
                                            <th><?= $this->Paginator->sort('modified') ?></th>
                                            <th class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($student_subjects as $studentSubject): ?>
                                        <tr>
                                            <td><?= $this->Number->format($studentSubject->id) ?></td>
                                            <td><?= $studentSubject->has('subject') ? $this->Html->link($studentSubject->subject->name, ['controller' => 'StudentSubjects', 'action' => 'view', $studentSubject->id]) : '' ?></td>
                                            <td><?= $this->Html->link($studentSubject->subject->user->name, ['controller' => 'Users', 'action' => 'view', $studentSubject->subject->user->id])?></td>
                                            <td><?= h($studentSubject->created) ?></td>
                                            <td><?= h($studentSubject->modified) ?></td>
                                            <td class="actions">
                                                <?= $this->Html->link('', ['controller'=>'StudentSubjects', 'action' => 'view', $studentSubject->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                                <?= $this->Form->postLink('', ['controller'=>'StudentSubjects', 'action' => 'delete', $studentSubject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentSubject->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
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