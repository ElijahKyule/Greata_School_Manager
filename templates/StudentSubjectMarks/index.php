 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentSubjectMark[]|\Cake\Collection\CollectionInterface $studentSubjectMarks
 */
?>
<div class="studentSubjectMarks index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Student Subject Marks') ?></h3>
</div>
<div class="studentSubjectMarks index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('subject') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('marks (%)') ?></th>
                    <th><?= $this->Paginator->sort('grade') ?></th>
                    <th><?= $this->Paginator->sort('comments') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th> 
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($studentSubjectMarks as $studentSubjectMark): ?>
                <tr>
                    <td><?= $this->Number->format($studentSubjectMark->id) ?></td>
                    <td><?= $studentSubjectMark->has('student') ? $this->Html->link($studentSubjectMark->student->name, ['controller' => 'Students', 'action' => 'view', $studentSubjectMark->student->id]) : '' ?></td>
                    <td><?= $studentSubjectMark->has('student_subject') ? $this->Html->link($studentSubjectMark->student_subject->id, ['controller' => 'StudentSubjects', 'action' => 'view', $studentSubjectMark->student_subject->id]) : '' ?></td>
                    <td><?= $studentSubjectMark->has('exam') ? $this->Html->link($studentSubjectMark->exam->exam_code, ['controller' => 'Exams', 'action' => 'view', $studentSubjectMark->exam->id]) : '' ?></td>
                    <td><?= $studentSubjectMark->has('classroom') ? $this->Html->link($studentSubjectMark->classroom->name, ['controller' => 'Classrooms', 'action' => 'view', $studentSubjectMark->classroom->id]) : '' ?></td>
                    <td><?= $this->Number->format($studentSubjectMark->marks) ?></td>
                    <td><?= h($studentSubjectMark->created) ?></td>
                    <td><?= h($studentSubjectMark->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $studentSubjectMark->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $studentSubjectMark->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $studentSubjectMark->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentSubjectMark->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
