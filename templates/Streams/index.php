 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stream[]|\Cake\Collection\CollectionInterface $streams
 */
?>
<div class="streams index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Streams') ?></h3>
</div>
<div class="streams index content">
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
                <?php foreach ($streams as $stream): ?>
                <tr>
                    <td><?= $this->Number->format($stream->id) ?></td>
                    <td><?= $this->Html->link($stream->name, ['action' => 'view', $stream->id]) ?></td>
                    <td><?= h($stream->created) ?></td>
                    <td><?= h($stream->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $stream->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $stream->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $stream->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stream->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
