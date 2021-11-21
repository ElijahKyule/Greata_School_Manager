 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Measure[]|\Cake\Collection\CollectionInterface $measures
 */
?>
<div class="measures index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Measures') ?></h3>
</div>
<div class="measures index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('abbreviation') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($measures as $measure): ?>
                <tr>
                    <td><?= $this->Number->format($measure->id) ?></td>
                    <td><?= $this->Html->link($measure->name, ['action' => 'view', $measure->id]) ?></td>
                    <td><?= h($measure->abbreviation) ?></td>
                    <td><?= h($measure->created) ?></td>
                    <td><?= h($measure->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $measure->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $measure->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $measure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $measure->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
