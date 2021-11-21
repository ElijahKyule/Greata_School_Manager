<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('New Employee') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>

    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="employees form content">
            <?= $this->Form->create($employee) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone_number');
                    echo $this->Form->control('address');
                    echo $this->Form->control('gender_id', ['options' => $genders, 'empty'=>'Select']);
                    echo $this->Form->control('date_of_birth');
                    echo $this->Form->control('qualifications');
                    echo $this->Form->control('salary_amount');
                    echo $this->Form->control('employment_date');
                    echo $this->Form->control('role_id', ['options' => $roles, 'empty'=>'Select']);
                    echo $this->Form->control('status_id', ['options' => $statuses, 'empty'=>'Select']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
