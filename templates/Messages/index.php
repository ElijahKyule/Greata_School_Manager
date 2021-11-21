 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message[]|\Cake\Collection\CollectionInterface $messages
 */
?>
<div class="messages index content-head">
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Messages') ?></h3>
</div>
<div class="messages index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th><?= h('Sender') ?></th>
                    <th><?= $this->Paginator->sort('messagestatus_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($messages as $message): ?>
                <tr>
                    <td><?= $this->Number->format($message->id) ?></td>
                    <td><?= $this->Html->link($message->code, ['action' => 'view', $message->id]) ?></td>
                    <td><?= h($message->title) ?></td>
                    <td><?= h($message->student->name) ?></td>
                    <td><?= h($message->user->name) ?></td>
                    <td><?= h($message->messagestatus->name) ?></td>
                    <td><?= h($message->created) ?></td>
                    <td><?= h($message->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $message->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $message->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
