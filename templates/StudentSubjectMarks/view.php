<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentSubjectMark $studentSubjectMark
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($studentSubjectMark->student_subject->subject->name) ?></h3>
        </div>
        <div class="pull-right">
             <?= $this->Html->link(__(' List'), ['controller'=>'Students', 'action' => 'view', $studentSubjectMark->student->id, '?'=>['tab'=>'subjectmarks']], ['class' => 'btn btn-success fa fa-list']) ?> 
        </div>
    </div>
    <div class="column-responsive column-80">
        <div class="studentSubjectMarks view content">
           <div class="card flex-fill">
            <div class="card-header">
                <h4><?= __('Details') ?></h4>
            </div>
            <div class="card-body d-flex table-responsive">
            <table width="100%">
                <tr>
                    <th><?= __('Student:') ?></th>
                    <td><?= $studentSubjectMark->has('student') ? $this->Html->link($studentSubjectMark->student->name, ['controller' => 'Students', 'action' => 'view', $studentSubjectMark->student->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Subject:') ?></th>
                    <td><?= $studentSubjectMark->has('student_subject') ? $this->Html->link($studentSubjectMark->student_subject->subject->name, ['controller' => 'StudentSubjects', 'action' => 'view', $studentSubjectMark->student_subject->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Exam:') ?></th>
                    <td><?= $studentSubjectMark->has('exam') ? $this->Html->link($studentSubjectMark->exam->exam_code, ['controller' => 'Exams', 'action' => 'view', $studentSubjectMark->exam->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Classroom:') ?></th>
                    <td><?= $studentSubjectMark->has('classroom') ? $this->Html->link($studentSubjectMark->classroom->name, ['controller' => 'Classrooms', 'action' => 'view', $studentSubjectMark->classroom->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Marks (%):') ?></th>
                    <td><?= $this->Number->format($studentSubjectMark->marks) ?></td>
                </tr>
                <tr>
                    <th><?= __('Grade:') ?></th>
                    <td><?= $studentSubjectMark->has('grade') ? $this->Html->link($studentSubjectMark->grade->name, ['controller' => 'Grades', 'action' => 'view', $studentSubjectMark->grade->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Comments:') ?></th>
                    <td><?= h($studentSubjectMark->grade->comments) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created:') ?></th>
                    <td><?= h($studentSubjectMark->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified:') ?></th>
                    <td><?= h($studentSubjectMark->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>