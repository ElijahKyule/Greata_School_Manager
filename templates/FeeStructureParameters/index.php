 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FeeStructureParameter[]|\Cake\Collection\CollectionInterface $feeStructureParameters
 */
?>
<div class="feeStructureParameters index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Fee Structure Parameters') ?></h3>
</div>
<div class="feeStructureParameters index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($feeStructureParameters as $feeStructureParameter): ?>
                <tr>
                    <td><?= $this->Number->format($feeStructureParameter->id) ?></td>
                    <td><?= $this->Html->link($feeStructureParameter->name, ['action' => 'view', $feeStructureParameter->id]) ?></td>
                    <td><?= h($feeStructureParameter->code) ?></td>
                    <td><?= h($feeStructureParameter->created) ?></td>
                    <td><?= h($feeStructureParameter->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $feeStructureParameter->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $feeStructureParameter->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $feeStructureParameter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feeStructureParameter->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
