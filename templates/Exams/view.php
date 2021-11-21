<?php  
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exam $exam
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($exam->exam_code) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id), 'class'=>'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $exam->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>

<?php
$tab_exam_details_status = 'active';
$tab_exam_subjects_status = '';

if ($tab == 'examsubjects' ) 
{
    $tab_exam_details_status = '';
    $tab_exam_subjects_status = 'active';
}
?>

<div class="exams view content">
    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#exam_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#exam_subjects" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fas fa-book-reader" style="padding-right: 5px;"></i>Exam Subjects
              </a>
            </li>
        </ul>
        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane <?= $tab_exam_details_status?>" id="exam_details">
              <div class="card flex-fill">
                <div class="card-body d-flex table-responsive" style="padding-top: 0;">
                    <table>
                        <tr>
                            <th><?= __('Exam Title:') ?></th>
                            <td><?= h($exam->title) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Exam Code:') ?></th>
                            <td><?= h($exam->exam_code) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Exam Type:') ?></th>
                            <td><?= h($exam->examtype->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Term:') ?></th>
                            <td><?= h($exam->term->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Level:') ?></th>
                            <td><?= $this->Number->format($exam->level_id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Year:') ?></th>
                            <td><?= $this->Number->format($exam->year) ?></td>
                        </tr>
                        <tr class="text">
                            <th><?= __('Description:') ?></th>
                            <td>
                                <?= $this->Text->autoParagraph(h($exam->description)); ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Status:') ?></th>
                            <td><?= h($exam->status->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Assigned to:') ?></th>
                            <td><?= h($exam->user->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Created:') ?></th>
                            <td><?= h($exam->created) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Modified:') ?></th>
                            <td><?= h($exam->modified) ?></td>
                        </tr>
                        
                    </table>
                </div>
               </div>
            </div>

            <div class="tab-pane <?= $tab_exam_subjects_status?>" id="exam_subjects">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add Subject to Exam:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'ExamSubjects', 'action' => 'add', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex table-responsive">
                        <div class="table-responsive">
                            <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id') ?></th>
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
                                    <?php  foreach ($exam->exam_subjects as $exam_subject): ?>
                                    <tr>
                                        <td><?= h($exam_subject->id) ?></td>
                                        <td><?= $this->Html->link($exam_subject->subject->name, ['controller'=>'ExamSubjects', 'action' => 'view', $exam_subject->id]) ?></td>
                                        <td><?= h($exam_subject->subject->code) ?></td>
                                        <td><?= $this->Number->format($exam_subject->score_of) ?></td>
                                        <td><?= h($exam_subject->measure->abbreviation) ?></td>
                                        <td><?= h($exam_subject->created) ?></td>
                                        <td><?= h($exam_subject->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller'=>'ExamSubjects', 'action' => 'view', $exam_subject->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?> 
                                             <?= $this->Html->link('', ['controller'=>'ExamSubjects', 'action' => 'edit', $exam_subject->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                            <?= $this->Form->postLink('', ['controller'=>'ExamSubjects', 'action' => 'delete', $exam_subject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam_subject->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
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