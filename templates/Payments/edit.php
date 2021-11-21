<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('Edit payment') ?></h4>
        </div>
        <?= $this->Html->link(__(' List'), ['controller'=>'Students', 'action' => 'view', $student_id, '?'=>['tab'=>'payments']], ['class' => 'btn btn-success float-right fa fa-list']) ?>

    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="payments form content">
            <?= $this->Form->create($payment) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('student_id', ['options' => $students]);
                    echo $this->Form->control('credit', ['label'=>'Credit / Paid']);
                    echo $this->Form->control('reference_number');
                    echo $this->Form->control('paymentmode_id', ['options' => $paymentmodes, 'empty'=>'Select..']);
                    echo $this->Form->control('description');
                    echo $this->Form->control('user_id', ['options' => $users, 'empty'=>'Select..', 'label'=>'Authorized by']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
