 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Announcement[]|\Cake\Collection\CollectionInterface $announcements
 */
?>
<div class="announcements index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Announcements') ?></h3>
</div>
<div class="announcements index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th class="text-muted"><?= h('Sender') ?></th>
                    <th class="text-muted"><?= h('Status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($announcements as $announcement): ?>
                <tr>
                    <td><?= $this->Number->format($announcement->id) ?></td>
                    <td><?= $this->Html->link($announcement->code, ['action' => 'view', $announcement->id]) ?></td>
                    <td><?= h($announcement->title) ?></td>
                    <td><?= h($announcement->user->name) ?></td>
                    <td><?= h($announcement->messagestatus->name) ?></td>
                    <td><?= h($announcement->created) ?></td>
                    <td><?= h($announcement->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $announcement->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $announcement->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $announcement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
