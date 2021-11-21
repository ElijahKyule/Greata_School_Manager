 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grade[]|\Cake\Collection\CollectionInterface $grades
 */
?>
<div class="grades index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Grades') ?></h3>
</div>
<div class="grades index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('grade') ?></th>
                    <th><?= $this->Paginator->sort('upper_bound') ?></th>
                    <th><?= $this->Paginator->sort('lower_bound') ?></th>
                    <th><?= $this->Paginator->sort('comments') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($grades as $grade): ?>
                <tr>
                    <td><?= $this->Number->format($grade->id) ?></td>
                    <td><?= $this->Html->link($grade->name, ['action' => 'view', $grade->id]) ?></td>
                    <td><?= $this->Number->format($grade->upper_bound) ?></td>
                    <td><?= $this->Number->format($grade->lower_bound) ?></td>
                    <td><?= h($grade->comments) ?></td>
                    <td><?= h($grade->created) ?></td>
                    <td><?= h($grade->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $grade->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $grade->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $grade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grade->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
