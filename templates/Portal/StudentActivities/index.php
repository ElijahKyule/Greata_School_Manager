 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentActivity[]|\Cake\Collection\CollectionInterface $studentActivities
 */
?>
<div class="studentActivities index content-head">
    <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
    <?= $this->Html->link(__(' Dashboard'), ['controller'=>'Pages', 'action' => 'home'], ['class' => 'btn btn-success float-right fa fa-home']) ?>
    <h3><?= __('Student Activities') ?></h3>
</div>
<div class="studentActivities index content">
    <div class="table-responsive">
        <table class='table table-striped table-condensed' width="100%">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
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
                <?php foreach ($studentActivities as $studentActivity): ?>
                <tr>
                    <td><?= $this->Number->format($studentActivity->id) ?></td>
                    <td><?= $studentActivity->has('student') ? $this->Html->link($studentActivity->student->name, ['controller' => 'Students', 'action' => 'view', $studentActivity->student->id]) : '' ?></td>
                    <td><?= $studentActivity->has('activity') ? $this->Html->link($studentActivity->activity->name, ['controller' => 'Activities', 'action' => 'view', $studentActivity->activity->id]) : '' ?></td>
                    <td><?= $studentActivity->has('status') ? $this->Html->link($studentActivity->status->name, ['controller' => 'Statuses', 'action' => 'view', $studentActivity->status->id]) : '' ?></td>
                    <td><?= h($studentActivity->start) ?></td>
                    <td><?= h($studentActivity->end) ?></td>
                    <td><?= $this->Number->format($studentActivity->achieved) ?></td>
                    <td><?= $studentActivity->has('measure') ? $this->Html->link($studentActivity->measure->name, ['controller' => 'Measures', 'action' => 'view', $studentActivity->measure->id]) : '' ?></td>
                    <td><?= h($studentActivity->created) ?></td>
                    <td><?= h($studentActivity->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['action' => 'view', $studentActivity->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                        <?= $this->Html->link('', ['action' => 'edit', $studentActivity->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                        <?= $this->Form->postLink('', ['action' => 'delete', $studentActivity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentActivity->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
