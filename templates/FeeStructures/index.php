 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FeeStructure[]|\Cake\Collection\CollectionInterface $feeStructures
 */
?>
<div class="feeStructures index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Fee Structures') ?></h3>
</div>
<div class="feeStructures index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('fee_id') ?></th>
                    <th><?= $this->Paginator->sort('fee_structure_parameter_id') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($feeStructures as $feeStructure): ?>
                <tr>
                    <td><?= $this->Number->format($feeStructure->id) ?></td>
                    <td><?= $feeStructure->has('fee') ? $this->Html->link($feeStructure->fee->fee_code, ['controller' => 'Fees', 'action' => 'view', $feeStructure->fee->id]) : '' ?></td>
                    <td><?= $feeStructure->has('fee_structure_parameter') ? $this->Html->link($feeStructure->fee_structure_parameter->name, ['controller' => 'FeeStructureParameters', 'action' => 'view', $feeStructure->fee_structure_parameter->id]) : '' ?></td>
                    <td><?= $this->Number->format($feeStructure->amount) ?></td>
                    <td><?= h($feeStructure->created) ?></td>
                    <td><?= h($feeStructure->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $feeStructure->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $feeStructure->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $feeStructure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feeStructure->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
