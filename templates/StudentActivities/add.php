<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentActivity $studentActivity
 */ 
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('New Student Activity') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['controller'=>'Students', 'action' => 'view', $id, '?'=>['tab'=>'activities']], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>

    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="studentActivities form content">
            <?= $this->Form->create($studentActivity) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('student_id', ['options' => $students]);
                    echo $this->Form->control('activity_id', ['options' => $activities, 'empty'=>'Select..']);
                    echo $this->Form->control('status_id', ['options' => $statuses, 'empty'=>'Select..']);
                    echo $this->Form->control('start');
                    echo $this->Form->control('end');
                    echo $this->Form->control('achieved');
                    echo $this->Form->control('measure_id', ['empty'=>'Select..', 'label'=>'Unit of Measure']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
