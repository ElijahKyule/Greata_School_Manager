 <?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classroomstatus[]|\Cake\Collection\CollectionInterface $classroomstatuses
 */
?>
<div class="classroomstatuses index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Classroom Statuses') ?></h3>
</div>
<div class="classroomstatuses index content">
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
                <?php foreach ($classroomstatuses as $classroomstatus): ?>
                <tr>
                    <td><?= $this->Number->format($classroomstatus->id) ?></td>
                    <td> <?= $this->Html->link($classroomstatus->name, ['action' => 'view', $classroomstatus->id]) ?></td>
                    <td><?= h($classroomstatus->created) ?></td>
                    <td><?= h($classroomstatus->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $classroomstatus->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $classroomstatus->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $classroomstatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classroomstatus->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
