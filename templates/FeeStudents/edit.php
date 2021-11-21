<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FeeStudent $feeStudent
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('New') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>
            <?= $this->Form->postLink(
                __(' Delete'),
                ['action' => 'delete', $feeStudent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $feeStudent->id), 'class' => 'btn btn-success float-right fa fa-trash']
            ) ?>

    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="feeStudents form content">
            <?= $this->Form->create($feeStudent) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('student_id', ['options' => $students, 'empty'=>'Select..']);
                    echo $this->Form->control('fee_id', ['options' => $fees, 'empty'=>'Select..']);
                    echo $this->Form->control('fee_paid');
                    echo $this->Form->control('paymentmode_id', ['options' => $paymentmodes, 'empty'=>'Select..']);
                    echo $this->Form->control('receipt_number');
                    echo $this->Form->control('user_id', ['options' => $users, 'empty'=>'Select..', 'label'=>'Authorized by']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
