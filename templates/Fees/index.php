 <?php
/** 
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fee[]|\Cake\Collection\CollectionInterface $fees
 */ 
?>
<div class="fees index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Fees') ?></h3>
</div>
<div class="fees index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('fee_code') ?></th>
                    <th><?= $this->Paginator->sort('level_id') ?></th>
                    <th><?= $this->Paginator->sort('year') ?></th>
                    <th class="text-muted"><?= h('Term/Program') ?></td>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fees as $fee): ?>
                <tr>
                    <td><?= $this->Number->format($fee->id) ?></td>
                    <td><?= $this->Html->link(__($fee->fee_code), ['action' => 'view', $fee->id]) ?></td>
                    <td><?= $this->Html->link(__($fee->level->name), ['controller'=>'Levels', 'action' => 'view', $fee->level->id]) ?></td>
                    <td><?= $this->Number->format($fee->year) ?></td>
                    <td><?= $this->Html->link(__($fee->term->name), ['controller'=>'Terms', 'action' => 'view', $fee->term->id]) ?></td>
                    <td><?= $this->Html->link(__($fee->status->name), ['controller'=>'Statuses', 'action' => 'view', $fee->status->id]) ?></td>
                    <td><?= h($fee->created) ?></td>
                    <td><?= h($fee->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $fee->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $fee->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $fee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fee->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
