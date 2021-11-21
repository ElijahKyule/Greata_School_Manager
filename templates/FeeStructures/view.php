<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FeeStructure $feeStructure
 */
?>
<div>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($feeStructure->fee_structure_parameter->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['controller'=>'Fees', 'action' => 'view', $feeStructure->fee->id, '?'=>['tab'=>'feestructure']], ['class' => 'btn btn-success float-right fa fa-list']) ?>
        </div>
    </div>
    <div class="column-responsive column-80">
        <div class="feeStructures view content">
            <table>
                <tr>
                    <th><?= __('Fee') ?></th>
                    <td><?= $feeStructure->has('fee') ? $this->Html->link($feeStructure->fee->fee_code, ['controller' => 'Fees', 'action' => 'view', $feeStructure->fee->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Fee Structure Parameter') ?></th>
                    <td><?= $feeStructure->has('fee_structure_parameter') ? $this->Html->link($feeStructure->fee_structure_parameter->name, ['controller' => 'FeeStructureParameters', 'action' => 'view', $feeStructure->fee_structure_parameter->id]) : '' ?></td>
                </tr>
                <tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($feeStructure->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($feeStructure->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($feeStructure->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
