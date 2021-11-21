 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClassroomActivity[]|\Cake\Collection\CollectionInterface $classroomActivities
 */
?>
<div class="classroomActivities index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Classroom Activities') ?></h3>
</div>
<div class="classroomActivities index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('classroom_id') ?></th>
                    <th><?= $this->Paginator->sort('activity_id') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('start') ?></th>
                    <th><?= $this->Paginator->sort('end') ?></th>
                    <th><?= $this->Paginator->sort('achieved') ?></th>
                    <th><?= $this->Paginator->sort('measure_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($classroomActivities as $classroomActivity): ?>
                <tr>
                    <td><?= $this->Number->format($classroomActivity->id) ?></td>
                    <td><?= $classroomActivity->has('classroom') ? $this->Html->link($classroomActivity->classroom->name, ['controller' => 'Classrooms', 'action' => 'view', $classroomActivity->classroom->id]) : '' ?></td>
                    <td><?= $classroomActivity->has('activity') ? $this->Html->link($classroomActivity->activity->name, ['controller' => 'Activities', 'action' => 'view', $classroomActivity->activity->id]) : '' ?></td>
                    <td><?= $classroomActivity->has('status') ? $this->Html->link($classroomActivity->status->name, ['controller' => 'Statuses', 'action' => 'view', $classroomActivity->status->id]) : '' ?></td>
                    <td><?= h($classroomActivity->start) ?></td>
                    <td><?= h($classroomActivity->end) ?></td>
                    <td><?= $this->Number->format($classroomActivity->achieved) ?></td>
                    <td><?= $classroomActivity->has('measure') ? $this->Html->link($classroomActivity->measure->name, ['controller' => 'Measures', 'action' => 'view', $classroomActivity->measure->id]) : '' ?></td>
                    <td><?= h($classroomActivity->created) ?></td>
                    <td><?= h($classroomActivity->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $classroomActivity->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $classroomActivity->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $classroomActivity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classroomActivity->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
