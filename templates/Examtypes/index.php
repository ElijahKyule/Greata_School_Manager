 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examtype[]|\Cake\Collection\CollectionInterface $examtypes
 */
?>
<div class="examtypes index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Examtypes') ?></h3>
</div>
<div class="examtypes index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('score_out_of') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($examtypes as $examtype): ?>
                <tr>
                    <td><?= $this->Number->format($examtype->id) ?></td>
                    <td><?= $this->Html->link($examtype->name, ['action' => 'view', $examtype->id]) ?></td>
                    <td><?= $this->Number->format($examtype->score_out_of) ?></td>
                    <td><?= h($examtype->created) ?></td>
                    <td><?= h($examtype->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $examtype->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $examtype->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $examtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examtype->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
