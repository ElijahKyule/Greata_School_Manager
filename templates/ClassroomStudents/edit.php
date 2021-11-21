<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClassroomStudent $classroomStudent
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('Edit Classroom Student') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' Class List'), ['controller'=>'Classrooms', 'action' => 'view', $authenticate_classroom, '?'=>['tab'=>'classlist']], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>
    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="classroomStudents form content">
            <?= $this->Form->create($classroomStudent) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('classroom_id', ['options' => $classrooms]);
                    echo $this->Form->control('student_id', ['options' => $students]);
                    echo $this->Form->control('classroomstatus_id', ['options' => $classroomstatuses, 'empty'=>'Select..', 'label'=>'Classroom Status']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
