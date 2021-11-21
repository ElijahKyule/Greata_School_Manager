 <?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classroom[]|\Cake\Collection\CollectionInterface $classrooms
 */
?>
<div class="classrooms index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Classrooms') ?></h3>
</div>
<div class="classrooms index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('level_id') ?></th>
                    <th><?= $this->Paginator->sort('stream_id') ?></th>
                    <th><?= $this->Paginator->sort('students_count') ?></th>
                    <th><?= $this->Paginator->sort('user_id', ['label'=>'Class Teacher']) ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($classrooms as $classroom):
                 ?> 
                <tr>
                    <td><?= $this->Number->format($classroom->id) ?></td>
                    <td><?= $this->Html->link($classroom->name, ['controller' => 'Classrooms', 'action' => 'view', $classroom->id]) ?></td>
                    <td><?= h($classroom->level) ?></td>
                    <td><?= h($classroom->stream) ?></td>
                    <td><?= $this->Html->link($classroom->total ? $classroom->total : 0, ['controller' => 'Classrooms', 'action' => 'view', $classroom->id]) ?></td>
                    <td><?= h($classroom->user) ?></td>
                    <td><?= h($classroom->created) ?></td>
                    <td><?= h($classroom->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Classrooms', 'action' => 'view', $classroom->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $classroom->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                       <?= $this->Form->postLink('', ['action' => 'delete', $classroom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classroom->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
