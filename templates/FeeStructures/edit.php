<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FeeStructure $feeStructure
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('Edit Fee Structure Parameter') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['controller'=>'Fees', 'action' => 'view', $selected_fee, '?'=>['tab'=>'feestructure']], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>

    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="feeStructures form content">
            <?= $this->Form->create($feeStructure) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('fee_id', ['options' => $fees]);
                    echo $this->Form->control('fee_structure_parameter_id', ['options' => $feeStructureParameters, 'empty'=>'Select..']);
                    echo $this->Form->control('amount');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
