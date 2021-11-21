<?php 
/** 
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subject $subject
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($subject->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $subject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subject->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $subject->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>

<div class="exams view content">
    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#subject_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#exam_subjects" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fas fa-book-reader" style="padding-right: 5px;"></i>Exams
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#student_subjects" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-users" style="padding-right: 5px;"></i>Students
              </a>
            </li>
        </ul>
        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane active" id="subject_details">
              <div class="card flex-fill">
                <div class="card-body d-flex table-responsive" style="padding-top: 0;">
                    <table width="100%">
                        <tr>
                            <th><?= __('Name:') ?></th>
                            <td><?= h($subject->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Code:') ?></th>
                            <td><?= h($subject->code) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Subject Teacher:') ?></th>
                            <td><?= h($subject->user->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Created:') ?></th>
                            <td><?= h($subject->created) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Modified:') ?></th>
                            <td><?= h($subject->modified) ?></td>
                        </tr>
                    </table>
                </div>
               </div>
            </div>

            <div class="tab-pane" id="exam_subjects">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex table-responsive">
                        <div class="table-responsive">
                            <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id') ?></th>
                                        <th><?= $this->Paginator->sort('exam_id') ?></th>
                                        <th><?= $this->Paginator->sort('subject_id') ?></th>
                                        <th><?= $this->Paginator->sort('subject_code') ?></th>
                                        <th><?= $this->Paginator->sort('score_out_of') ?></th>
                                        <th><?= $this->Paginator->sort('score_measure') ?></th>
                                        <th><?= $this->Paginator->sort('created') ?></th>
                                        <th><?= $this->Paginator->sort('modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($subject->exam_subjects as $exam_subject): ?>
                                    <tr>
                                        <td><?= h($exam_subject->id) ?></td>
                                        <td><?= $this->Html->link($exam_subject->exam->exam_code, ['controller'=>'Exams', 'action' => 'view', $exam_subject->exam->id, '?'=>['tab'=>'examsubjects']]) ?></td>
                                        <td><?= h($exam_subject->subject->name) ?></td>
                                        <td><?= h($exam_subject->subject->code) ?></td>
                                        <td><?= $this->Number->format($exam_subject->score_of) ?></td>
                                        <td><?= h($exam_subject->measure->abbreviation) ?></td>
                                        <td><?= h($exam_subject->created) ?></td>
                                        <td><?= h($exam_subject->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller'=>'Exams', 'action' => 'view', $exam_subject->exam->id, '?'=>['tab'=>'examsubjects']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="student_subjects">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex table-responsive">
                        <div class="table-responsive">
                            <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id') ?></th>
                                        <th><?= $this->Paginator->sort('student_id') ?></th>
                                        <th><?= $this->Paginator->sort('subject_id') ?></th>
                                        <th><?= $this->Paginator->sort('created') ?></th>
                                        <th><?= $this->Paginator->sort('modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($subject->student_subjects as $student_subject): ?>
                                    <tr>
                                        <td><?= h($student_subject->id) ?></td>
                                        <td><?= $this->Html->link($student_subject->student->name, ['controller'=>'Students', 'action' => 'view', $student_subject->student->id, '?'=>['tab'=>'subjects']]) ?></td>
                                        <td><?= h($student_subject->subject->name) ?></td>
                                        <td><?= h($student_subject->created) ?></td>
                                        <td><?= h($student_subject->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller'=>'Students', 'action' => 'view', $student_subject->student->id, '?'=>['tab'=>'subjects']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
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