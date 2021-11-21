<?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExamSubject $examSubject
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($examSubject->subject->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['controller'=>'Exams', 'action' => 'view', $examSubject->exam->id, '?'=>['tab'=>'examsubjects']], ['class' => 'btn btn-success float-right fa fa-list']) ?>
        </div>
    </div>
    <div class="column-responsive column-80">
        <div class="examSubjects view content">
           <div class="card flex-fill">
            <div class="card-header">
                <h4><?= __('Exam Subject Details') ?></h4>
            </div>
            <div class="card-body d-flex table-responsive">
            <table width="100%">
                <tr>
                    <th><?= __('Exam:') ?></th>
                    <td><?= $examSubject->has('exam') ? $this->Html->link($examSubject->exam->exam_code, ['controller' => 'Exams', 'action' => 'view', $examSubject->exam->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Subject:') ?></th>
                    <td><?= $examSubject->has('subject') ? $this->Html->link($examSubject->subject->name, ['controller' => 'Subjects', 'action' => 'view', $examSubject->subject->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Score Out Of:') ?></th>
                    <td><?= $this->Number->format($examSubject->score_of) ?></td>
                </tr>
                <tr>
                    <th><?= __('Score Measure:') ?></th>
                    <td><?= h($examSubject->measure->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created:') ?></th>
                    <td><?= h($examSubject->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified:') ?></th>
                    <td><?= h($examSubject->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>