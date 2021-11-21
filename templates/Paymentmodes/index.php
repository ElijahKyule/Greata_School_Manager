 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paymentmode[]|\Cake\Collection\CollectionInterface $paymentmodes
 */
?>
<div class="paymentmodes index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Payment Modes') ?></h3>
</div>
<div class="paymentmodes index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paymentmodes as $paymentmode): ?>
                <tr>
                    <td><?= $this->Number->format($paymentmode->id) ?></td>
                    <td> <?= $this->Html->link($paymentmode->name, ['action' => 'view', $paymentmode->id]) ?></td>
                    <td><?= h($paymentmode->created) ?></td>
                    <td><?= h($paymentmode->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $paymentmode->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $paymentmode->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $paymentmode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentmode->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
