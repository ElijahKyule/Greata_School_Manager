<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmployeeLeave $employeeLeave
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('Edit Employee Leave') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['controller'=>'Users', 'action' => 'view', $selected_user,'?'=>['tab'=>'leaves']], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>
    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="employeeLeaves form content">
            <?= $this->Form->create($employeeLeave) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('employee_id', ['options' => $employees]);
                    echo $this->Form->control('leave_id', ['options' => $leaves, 'empty'=>'Select..', 'label'=>'Reason For Leave']);
                    echo $this->Form->control('description');
                    echo $this->Form->control('duration');
                    echo $this->Form->control('measure_id', ['options' => $measures, 'empty'=>'Select..', 'label'=>'Duration Measure']);
                    echo $this->Form->control('user_id', ['options' => $users, 'empty'=>'Select..', 'label'=>'Authorized by']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
