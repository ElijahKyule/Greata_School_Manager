<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentSubjectMark $studentSubjectMark
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('New Student Subject Mark') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['controller'=>'Students', 'action' => 'view', $id, '?'=>['tab'=>'subjectmarks']], ['class' => 'btn btn-success fa fa-list']) ?> 
        </div>

    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="studentSubjectMarks form content">
            <?= $this->Form->create($studentSubjectMark) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('student_id', ['options' => $students]);
                    echo $this->Form->control('classroom_id', ['options' => $classrooms]);
                    echo $this->Form->control('exam_id', ['options' => $exams, 'empty'=>'Select..']);
                    echo $this->Form->control('student_subject_id',['options'=>$studentSubjects,'label'=>'Subject', 'empty'=>'Select..']);
                    echo $this->Form->control('marks', ['label'=>'Marks/Score']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
