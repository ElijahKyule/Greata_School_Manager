<?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('New Student') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>

    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="students form content">
            <?= $this->Form->create($student) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone_number');
                    echo $this->Form->control('admission_number');
                    echo $this->Form->control('gender_id', ['options' => $genders, 'empty'=>'Select..']);
                    echo $this->Form->control('date_of_birth');
                    echo $this->Form->control('address');
                    echo $this->Form->control('password');
                    echo $this->Form->control('status_id', ['type'=>'hidden']);
                    echo $this->Form->control('classroomstatus_id', ['label'=>'Classroom Status', 'type'=>'hidden']);
                    echo $this->Form->control('admission_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>