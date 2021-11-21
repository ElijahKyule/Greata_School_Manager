 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExamSubject[]|\Cake\Collection\CollectionInterface $examSubjects
 */
?>
<div class="examSubjects index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Exam Subjects') ?></h3>
</div>
<div class="examSubjects index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('exam_id') ?></th>
                    <th><?= $this->Paginator->sort('subject_id') ?></th>
                    <th><?= $this->Paginator->sort('score_of') ?></th>
                    <th><?= $this->Paginator->sort('measure_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($examSubjects as $examSubject): ?>
                <tr>
                    <td><?= $this->Number->format($examSubject->id) ?></td>
                    <td><?= $examSubject->has('exam') ? $this->Html->link($examSubject->exam->exam_code, ['controller' => 'Exams', 'action' => 'view', $examSubject->exam->id]) : '' ?></td>
                    <td><?= $examSubject->has('subject') ? $this->Html->link($examSubject->subject->name, ['controller' => 'Subjects', 'action' => 'view', $examSubject->subject->id]) : '' ?></td>
                    <td><?= $this->Number->format($examSubject->score_of) ?></td>
                    <td><?= $this->Number->format($examSubject->measure_id) ?></td>
                    <td><?= h($examSubject->created) ?></td>
                    <td><?= h($examSubject->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $examSubject->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $examSubject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examSubject->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
