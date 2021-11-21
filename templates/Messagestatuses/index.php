 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Messagestatus[]|\Cake\Collection\CollectionInterface $messagestatuses
 */
?>
<div class="messagestatuses index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Message Statuses') ?></h3>
</div>
<div class="messagestatuses index content">
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
                <?php foreach ($messagestatuses as $messagestatus): ?>
                <tr>
                    <td><?= $this->Number->format($messagestatus->id) ?></td>
                    <td><?= $this->Html->link($messagestatus->name, ['action' => 'view', $messagestatus->id]) ?></td>
                    <td><?= h($messagestatus->created) ?></td>
                    <td><?= h($messagestatus->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $messagestatus->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $messagestatus->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $messagestatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messagestatus->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
